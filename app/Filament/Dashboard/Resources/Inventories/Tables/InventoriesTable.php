<?php

namespace App\Filament\Dashboard\Resources\Inventories\Tables;

use Carbon\Carbon;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;

class InventoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('inventory_number')
                    ->label('Inv Number')
                    ->searchable(),
                TextColumn::make('deviceName.name')
                    ->label('Device Name'),
                TextColumn::make('serial_number')
                    ->label('Serial Number')
                    ->searchable(),
                TextColumn::make('brand.name')
                    ->label('Brand')
                    ->searchable(),
                TextColumn::make('type.name')
                    ->label('Type')
                    ->searchable(),
                TextColumn::make('procurement_year')
                    ->label('Procurement Year')
                    ->searchable(),
                TextColumn::make('location.name')
                    ->label('Location')
                    ->searchable(),
                TextColumn::make('last_calibration_date')
                    ->label('Last Calibration')
                    ->formatStateUsing(fn($record) => Carbon::parse($record->last_calibration_date)->format('d M Y'))
                    ->searchable(),
                TextColumn::make('next_calibration_date')
                    ->label('Next Calibration')
                    ->formatStateUsing(fn($record) => Carbon::parse($record->next_calibration_date)->format('d M Y') ?? 'N/A')
                    ->searchable(),
                TextColumn::make('status')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make()
                    ->successNotificationTitle('Inventory updated successfully'),
                DeleteAction::make()
                    ->successNotificationTitle('Inventory deleted successfully'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                    ->successNotificationTitle('Selected Inventories updated successfully'),
                ]),
            ]);
    }
}
