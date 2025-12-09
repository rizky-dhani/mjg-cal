<?php

namespace App\Filament\Dashboard\Resources\DeviceNames\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DeviceNamesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('devicenames.columns.name'))
                    ->searchable(),
                TextColumn::make('slug')
                    ->label(__('devicenames.columns.slug'))
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make()
                    ->label(__('devicenames.actions.edit'))
                    ->successNotificationTitle(__('devicenames.actions.edit_success', ['label' => __('devicenames.label')])),
                DeleteAction::make()
                    ->label(__('devicenames.actions.delete'))
                    ->successNotificationTitle(__('devicenames.actions.delete_success', ['label' => __('devicenames.label')])),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->label(__('devicenames.actions.delete'))
                        ->successNotificationTitle(__('devicenames.actions.delete_multiple_success', ['label' => __('devicenames.plural_label')])),
                ]),
            ]);
    }
}
