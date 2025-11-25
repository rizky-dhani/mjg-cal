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
                    ->label('Device Name')
                    ->relationship('deviceName', 'name')
                    ->createOptionModalHeading('Add New Device Name')
                    ->createOptionForm([
                        TextInput::make('name')
                            ->required()
                    ])
                    ->searchable()
                    ->preload()
                    ->required()
                    ->columnSpanFull(),
                Grid::make(4)
                    ->schema([
                        TextInput::make('serial_number')
                            ->label('Serial Number'),
                        Select::make('brand_id')
                            ->label('Brand')
                            ->relationship('brand', 'name')
                            ->createOptionModalHeading('Add New Brand')
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->required()
                            ])
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('type_id')
                            ->label('Type')
                            ->relationship('type', 'name')
                            ->createOptionModalHeading('Add New Type')
                            ->createOptionForm([
                                Select::make('brand_id')
                                    ->label('Brand')
                                    ->required()
                                    ->relationship('brand', 'name')
                                    ->createOptionModalHeading('Add New Brand')
                                    ->createOptionForm([
                                        TextInput::make('name')
                                            ->required()
                                    ])
                                    ->preload()
                                    ->searchable(),
                                TextInput::make('name')
                                    ->required()
                            ])
                            ->searchable()
                            ->preload()
                            ->required(),
                        DatePicker::make('procurement_year')
                            ->label('Procurement Year')
                            ->native(false)
                            ->displayFormat('Y')
                            ->format('Y')
                            ->closeOnDateSelection()
                    ])
                    ->columnSpanFull(),
                Select::make('location_id')
                    ->label('Location')
                    ->relationship('location', 'name')
                        ->createOptionModalHeading('Add New Location')
                        ->createOptionForm([
                            TextInput::make('name')
                                ->required()
                        ])
                    ->searchable()
                    ->preload()
                    ->required()
                    ->columnSpanFull(),
                DatePicker::make('last_calibration_date')
                    ->label('Last Calibration Date')
                    ->native(false)
                    ->displayFormat('d/m/Y')
                    ->format('Y-m-d')
                    ->closeOnDateSelection()
                    ->columnSpanFull()
            ]);
    }
}
