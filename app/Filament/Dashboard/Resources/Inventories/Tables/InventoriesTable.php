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
                    ->label(__('inventories.columns.inventory_number'))
                    ->searchable(),
                TextColumn::make('deviceName.name')
                    ->label(__('inventories.columns.device_name')),
                TextColumn::make('serial_number')
                    ->label(__('inventories.columns.serial_number'))
                    ->searchable(),
                TextColumn::make('brand.name')
                    ->label(__('inventories.columns.brand'))
                    ->searchable(),
                TextColumn::make('type.name')
                    ->label(__('inventories.columns.type'))
                    ->searchable(),
                TextColumn::make('procurement_year')
                    ->label(__('inventories.columns.procurement_year'))
                    ->searchable(),
                TextColumn::make('location.name')
                    ->label(__('inventories.columns.location_id'))
                    ->searchable(),
                TextColumn::make('last_calibration_date')
                    ->label(__('inventories.columns.last_calibration_date'))
                    ->formatStateUsing(fn($record) => Carbon::parse($record->last_calibration_date)->format('d M Y'))
                    ->searchable(),
                TextColumn::make('next_calibration_date')
                    ->label(__('inventories.columns.next_calibration_date'))
                    ->formatStateUsing(fn($record) => Carbon::parse($record->next_calibration_date)->format('d M Y') ?? 'N/A')
                    ->searchable(),
                TextColumn::make('status')
                    ->label(__('inventories.columns.status'))
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label(__('inventories.columns.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label(__('inventories.columns.updated_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make()
                    ->color('info')
                    ->label(__('inventories.actions.edit'))
                    ->successNotificationTitle(__('inventories.actions.edit_success', ['label' => __('inventories.label')])),
                DeleteAction::make()
                    ->label(__('inventories.actions.delete'))
                    ->successNotificationTitle(__('inventories.actions.delete_success', ['label' => __('inventories.label')])),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                    ->label(__('inventories.actions.delete'))
                    ->successNotificationTitle(__('inventories.actions.delete_multiple_success', ['label' => __('inventories.plural_label')])),
                ]),
            ]);
    }
}
