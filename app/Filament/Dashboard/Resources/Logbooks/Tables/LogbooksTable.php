<?php

namespace App\Filament\Dashboard\Resources\Logbooks\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class LogbooksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('log_number')
                    ->label('Log Number')
                    ->searchable(),
                TextColumn::make('date')
                    ->date('d M Y')
                    ->sortable(),
                TextColumn::make('inventory.inventory_number')
                    ->label('Inventory')
                    ->tooltip(fn($record) => $record->inventory->deviceName->name)
                    ->sortable(),
                TextColumn::make('start_date')
                    ->label('Start Date')
                    ->date('d M Y')
                    ->sortable(),
                TextColumn::make('end_date')
                    ->label('End Date')
                    ->date('d M Y')
                    ->sortable(),
                TextColumn::make('location.name')
                    ->searchable(),
                TextColumn::make('pic.name')
                    ->label('PIC')
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Available' => 'success',
                        'Borrowed' => 'danger',
                        default => 'gray',
                    }),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make()
                    ->successNotificationTitle('Log updated successfully'),
                DeleteAction::make()
                    ->successNotificationTitle('Log deleted successfully'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                    ->successNotificationTitle('Selected Log(s) deleted successfully'),
                ]),
            ]);
    }
}
