<?php

namespace App\Filament\Dashboard\Resources\Inventories\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;

class InventoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('device_name_id')
                    ->label(__('inventories.form.device_name_id.label'))
                    ->relationship('deviceName', 'name')
                    ->createOptionModalHeading(__('inventories.form.create_device_name_modal_heading'))
                    ->createOptionForm([
                        TextInput::make('name')
                            ->label(__('inventories.form.name.label'))
                            ->required()
                    ])
                    ->searchable()
                    ->preload()
                    ->required()
                    ->columnSpanFull(),
                Grid::make(4)
                    ->schema([
                        TextInput::make('serial_number')
                            ->label(__('inventories.form.serial_number.label')),
                        Select::make('brand_id')
                            ->label(__('inventories.form.brand_id.label'))
                            ->relationship('brand', 'name')
                            ->createOptionModalHeading(__('inventories.form.create_brand_modal_heading'))
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->label(__('inventories.form.name.label'))
                                    ->required()
                            ])
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('type_id')
                            ->label(__('inventories.formtype_id.label'))
                            ->relationship('type', 'name')
                            ->createOptionModalHeading(__('inventories.form.create_type_modal_heading'))
                            ->createOptionForm([
                                Select::make('brand_id')
                                    ->label(__('inventories.form.brand.label'))
                                    ->required()
                                    ->relationship('brand', 'name')
                                    ->createOptionModalHeading(__('inventories.form.create_brand_modal_heading'))
                                    ->createOptionForm([
                                        TextInput::make('name')
                                            ->label(__('inventories.form.name.label'))
                                            ->required()
                                    ])
                                    ->preload()
                                    ->searchable(),
                                TextInput::make('name')
                                    ->label(__('inventories.form.name.label'))
                                    ->required()
                            ])
                            ->searchable()
                            ->preload()
                            ->required(),
                        DatePicker::make('procurement_year')
                            ->label(__('inventories.form.procurement_year.label'))
                            ->native(false)
                            ->displayFormat('Y')
                            ->format('Y')
                            ->closeOnDateSelection()
                    ])
                    ->columnSpanFull(),
                Select::make('location_id')
                    ->label(__('inventories.form.location_id.label'))
                    ->relationship('location', 'name')
                        ->createOptionModalHeading(__('inventories.form.create_location_modal_heading'))
                        ->createOptionForm([
                            TextInput::make('name')
                                ->label(__('inventories.form.name.label'))
                                ->required()
                        ])
                    ->searchable()
                    ->preload()
                    ->required()
                    ->columnSpanFull(),
                DatePicker::make('last_calibration_date')
                    ->label(__('inventories.form.last_calibration_date.label'))
                    ->native(false)
                    ->displayFormat('d/m/Y')
                    ->format('Y-m-d')
                    ->closeOnDateSelection()
                    ->columnSpanFull()
            ]);
    }
}
