<?php

namespace App\Filament\Dashboard\Resources\Locations\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class LocationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('locations.columns.name'))
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make()
                    ->color('info')
                    ->label(__('locations.actions.edit'))
                    ->successNotificationTitle(__('locations.actions.edit_success', ['label' => __('locations.label')])),
                DeleteAction::make()
                    ->label(__('locations.actions.delete'))
                    ->successNotificationTitle(__('locations.actions.delete_success', ['label' => __('locations.label')]))
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->label(__('locations.actions.delete'))
                        ->successNotificationTitle(__('locations.actions.delete_multiple_success', ['label' => __('locations.plural_label')])),
                ]),
            ]);
    }
}
