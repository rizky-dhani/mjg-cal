<?php

namespace App\Filament\Dashboard\Resources\Devices\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class DeviceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('device_name_id')
                    ->required()
                    ->numeric(),
                TextInput::make('device_number')
                    ->required(),
                TextInput::make('brand_id')
                    ->numeric()
                    ->default(null),
                TextInput::make('type_id')
                    ->numeric()
                    ->default(null),
                TextInput::make('serial_number')
                    ->default(null),
                TextInput::make('location')
                    ->default(null),
                TextInput::make('procurement_year')
                    ->default(null),
                TextInput::make('pic_id')
                    ->numeric()
                    ->default(null),
                TextInput::make('customer_id')
                    ->numeric()
                    ->default(null),
                DatePicker::make('calibrated_date'),
                DatePicker::make('next_calibration_date'),
                TextInput::make('cert_number')
                    ->default(null),
                TextInput::make('barcode')
                    ->default(null),
                TextInput::make('result')
                    ->default(null),
                Select::make('status')
                    ->options(['Available' => 'Available', 'Unavailable' => 'Unavailable'])
                    ->default('Available')
                    ->required(),
                Textarea::make('notes')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('admin_id')
                    ->numeric()
                    ->default(null),
            ]);
    }
}
