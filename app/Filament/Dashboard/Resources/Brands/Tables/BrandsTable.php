<?php

namespace App\Filament\Dashboard\Resources\Brands\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BrandsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('brands.columns.name'))
                    ->searchable(),
                TextColumn::make('slug')
                    ->label(__('brands.columns.slug'))
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make()
                    ->color('info')
                    ->label(__('brands.actions.edit'))
                    ->successNotificationTitle(__('brands.actions.edit_success', ['label' => __('brands.label')])),
                DeleteAction::make()
                    ->label(__('brands.actions.delete'))
                    ->successNotificationTitle(__('brands.actions.delete_success', ['label' => __('brands.label')])),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->label(__('brands.actions.delete'))
                        ->successNotificationTitle(__('brands.actions.delete_multiple_success', ['label' => __('brands.plural_label')])),
                ]),
            ]);
    }
}
