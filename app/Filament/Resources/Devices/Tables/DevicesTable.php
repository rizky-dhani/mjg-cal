<?php

namespace App\Filament\Dashboard\Resources\Devices\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DevicesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('device_name_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('device_number')
                    ->searchable(),
                TextColumn::make('brand_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('type_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('serial_number')
                    ->searchable(),
                TextColumn::make('location')
                    ->searchable(),
                TextColumn::make('procurement_year'),
                TextColumn::make('pic_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('customer_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('calibrated_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('next_calibration_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('cert_number')
                    ->searchable(),
                TextColumn::make('barcode')
                    ->searchable(),
                TextColumn::make('result')
                    ->searchable(),
                TextColumn::make('status')
                    ->badge(),
                TextColumn::make('admin_id')
                    ->numeric()
                    ->sortable(),
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
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
