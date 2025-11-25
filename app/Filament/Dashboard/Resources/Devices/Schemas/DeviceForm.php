<?php

namespace App\Filament\Dashboard\Resources\Devices\Schemas;

use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class DeviceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('device_name_id')
                    ->relationship('deviceName', 'name')
                    ->preload()
                    ->searchable()
                    ->createOptionModalHeading('Add New Device Name')
                    ->createOptionForm([
                        TextInput::make('name')
                            ->columnSpanFull()
                            ->required(),
                    ])
                    ->columnSpanFull()
                    ->required(),
                Grid::make(3)
                    ->schema([
                        TextInput::make('serial_number')
                            ->default(null),
                        Select::make('brand_id')
                            ->relationship('brand', 'name')
                            ->preload()
                            ->searchable()
                            ->createOptionModalHeading('Add New Brand')
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->columnSpanFull()
                                    ->required(),
                            ])
                            ->default(null),
                        Select::make('type_id')
                            ->relationship('type', 'name')
                            ->preload()
                            ->searchable()
                            ->createOptionModalHeading('Add New Type')
                            ->createOptionForm([
                                Select::make('brand_id')
                                    ->label('Brand')
                                    ->relationship('brand', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->required(),
                                TextInput::make('name')
                                    ->required(),
                            ]),
                        ])
                        ->columnSpanFull(),
                Select::make('location_id')
                    ->relationship('location', 'name')
                    ->preload()
                    ->searchable()
                    ->createOptionModalHeading('Add New Location')
                    ->createOptionForm([
                        TextInput::make('name')
                            ->required()
                            ->columnSpanFull(),
                    ]),
                Select::make('customer_id')
                    ->relationship('customer', 'name')
                    ->preload()
                    ->searchable()
                    ->createOptionModalHeading('Add New Customer')
                    ->createOptionForm([
                        TextInput::make('name')
                            ->required(),
                        TextInput::make('phone_number')
                            ->tel()
                            ->required()
                            ->default(null),
                        Textarea::make('address')
                            ->default(null)
                            ->columnSpanFull(),
                    ]),
                TextInput::make('procurement_year')
                    ->default(null),
                DatePicker::make('calibrated_date')
                    ->label('Last Calibrated Date')
                    ->native(false)
                    ->displayFormat('d/m/Y')
                    ->format('Y-m-d')
                    ->closeOnDateSelection(),
                Select::make('result')
                    ->options([
                        'Fit For Use' => 'Fit For Use',
                        'Not Fit For Use' => 'Not Fit For Use',
                    ]),
                Select::make('status')
                    ->options(['Available' => 'Available', 'Unavailable' => 'Unavailable'])
                    ->default('Available')
                    ->required(),
                FileUpload::make('cert_number')
                    ->disk('public')
                    ->directory('certificates')
                    ->visibility('public')
                    ->columnSpanFull(),
            ]);
    }
}
