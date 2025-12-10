<?php

namespace App\Filament\Dashboard\Resources\Permissions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PermissionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('permissions.columns.name'))
                    ->searchable(),
                TextColumn::make('guard_name')
                    ->label(__('permissions.columns.guard_name'))
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make()
                    ->color('info')
                    ->label(__('permissions.actions.edit'))
                    ->successNotificationTitle(__('permissions.actions.edit_success', ['label' => __('permissions.label')])),
                DeleteAction::make()
                    ->label(__('permissions.actions.delete'))
                    ->successNotificationTitle(__('permissions.actions.delete_success', ['label' => __('permissions.label')])),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->label(__('permissions.actions.delete'))
                        ->successNotificationTitle(__('permissions.actions.delete_multiple_success', ['label' => __('permissions.plural_label')])),
                ]),
            ]);
    }
}
