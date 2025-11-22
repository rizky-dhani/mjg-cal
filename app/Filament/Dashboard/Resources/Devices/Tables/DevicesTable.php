<?php

namespace App\Filament\Dashboard\Resources\Devices\Tables;

use Carbon\Carbon;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;

class DevicesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('device_name_id')
                    ->label('Device Name')
                    ->numeric()
                    ->sortable()
                    ->getStateUsing(fn ($record) => $record->deviceName?->name ?? 'N/A'),
                TextColumn::make('device_number')
                    ->label('Device Number')
                    ->searchable()
                    ->getStateUsing(fn ($record) => $record->device_number ?? 'N/A'),
                TextColumn::make('brand_id')
                    ->label('Brand')
                    ->numeric()
                    ->sortable()
                    ->getStateUsing(fn ($record) => $record->brand?->name ?? 'N/A'),
                TextColumn::make('type_id')
                    ->label('Type')
                    ->numeric()
                    ->sortable()
                    ->getStateUsing(fn ($record) => $record->type?->name ?? 'N/A'),
                TextColumn::make('serial_number')
                    ->label('Serial Number')
                    ->searchable()
                    ->getStateUsing(fn ($record) => $record->serial_number ?? 'N/A'),
                TextColumn::make('location')
                    ->label('Location')
                    ->searchable()
                    ->getStateUsing(fn ($record) => $record->location ?? 'N/A'),
                TextColumn::make('procurement_year')
                    ->label('Procurement Year')
                    ->getStateUsing(fn ($record) => $record->procurement_year ?: 'N/A'),
                TextColumn::make('pic_id')
                    ->label('PIC')
                    ->numeric()
                    ->sortable()
                    ->getStateUsing(fn ($record) => $record->pic?->name ?? 'N/A'),
                TextColumn::make('customer_id')
                    ->label('Customer')
                    ->numeric()
                    ->sortable()
                    ->getStateUsing(fn ($record) => $record->customer?->name ?? 'N/A'),
                TextColumn::make('calibrated_date')
                    ->label('Calibrated Date')
                    ->sortable()
                    ->getStateUsing(fn ($record) => $record->calibrated_date ? Carbon::parse($record->calibrated_date)->format('Y-m-d') : 'N/A'),
                TextColumn::make('next_calibration_date')
                    ->label('Next Calibration Date')
                    ->sortable()
                    ->getStateUsing(fn ($record) => $record->next_calibration_date ? Carbon::parse($record->next_calibration_date)->format('Y-m-d') : 'N/A'),
                TextColumn::make('cert_number')
                    ->searchable()
                    ->getStateUsing(fn ($record) => $record->cert_number ?? 'N/A'),
                TextColumn::make('result')
                    ->label('Result')
                    ->searchable()
                    ->getStateUsing(fn ($record) => $record->result ?? 'N/A'),
                TextColumn::make('status')
                    ->badge()
                    ->getStateUsing(fn ($record) => $record->status ?? 'N/A'),
                TextColumn::make('admin_id')
                    ->label('Admin')
                    ->numeric()
                    ->sortable()
                    ->getStateUsing(fn ($record) => $record->admin?->name ?? 'N/A'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                Action::make('View')
                    ->icon('heroicon-o-eye')
                    ->openUrlInNewTab()
                    ->url(fn ($record) => route('devices.publicDetail', $record->deviceId)),
                EditAction::make()
                    ->mutateFormDataUsing(function (array $data): array {
                        $user = auth()->user();

                        // Fill pic_id if user role is Technician
                        if ($user && $user->role === 'Technician') {
                            $data['pic_id'] = $user->id;
                        }

                        // Fill admin_id if user role is Admin
                        if ($user && $user->role === 'Admin') {
                            $data['admin_id'] = $user->id;
                        }

                        return $data;
                    }),
                DeleteAction::make()
                    ->requiresConfirmation()
                    ->successNotificationTitle('Device and QR code deleted successfully')
                    ->action(function ($record) {
                        // Delete the associated QR code file if it exists
                        if ($record->barcode) {
                            Storage::disk('public')->delete($record->barcode);
                        }

                        // Delete the record from the database
                        $record->delete();
                    }),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->requiresConfirmation()
                        ->action(function ($records) {
                            foreach ($records as $record) {
                                // Delete the associated QR code file if it exists
                                if ($record->barcode) {
                                    Storage::disk('public')->delete($record->barcode);
                                }
                            }

                            // Delete the records from the database
                            $records->each->delete();
                        }),
                ]),
            ]);
    }
}
