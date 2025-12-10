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
                    ->label(__('logbooks.columns.log_number'))
                    ->searchable(),
                TextColumn::make('date')
                    ->label(__('logbooks.columns.date'))
                    ->date('d M Y')
                    ->sortable(),
                TextColumn::make('inventory.inventory_number')
                    ->label(__('logbooks.columns.inventory'))
                    ->tooltip(fn($record) => $record->inventory->deviceName->name)
                    ->sortable(),
                TextColumn::make('start_date')
                    ->label(__('logbooks.columns.start_date'))
                    ->date('d M Y')
                    ->sortable(),
                TextColumn::make('end_date')
                    ->label(__('logbooks.columns.end_date'))
                    ->date('d M Y')
                    ->sortable(),
                TextColumn::make('location.name')
                    ->label(__('logbooks.columns.location'))
                    ->searchable(),
                TextColumn::make('pic.name')
                    ->label(__('logbooks.columns.pic'))
                    ->sortable(),
                TextColumn::make('status')
                    ->label(__('logbooks.columns.status'))
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
                    ->color('info')
                    ->label(__('logbooks.actions.edit'))
                    ->successNotificationTitle(__('logbooks.actions.edit_success', ['label' => __('logbooks.label')])),
                DeleteAction::make()
                    ->label(__('logbooks.actions.delete'))
                    ->successNotificationTitle(__('logbooks.actions.delete_success', ['label' => __('logbooks.label')])),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                    ->label(__('logbooks.actions.delete'))
                    ->successNotificationTitle(__('logbooks.actions.delete_multiple_success', ['label' => __('logbooks.plural_label')])),
                ]),
            ]);
    }
}
