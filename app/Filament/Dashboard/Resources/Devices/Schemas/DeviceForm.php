<?php

namespace App\Filament\Dashboard\Resources\Devices\Schemas;

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
                    ->required(),
                TextInput::make('serial_number')
                    ->default(null),
                Select::make('brand_id')
                    ->relationship('brand', 'name')
                    ->default(null),
                Select::make('type_id')
                    ->relationship('type', 'name')
                    ->default(null),
                TextInput::make('location')
                    ->default(null),
                TextInput::make('procurement_year')
                    ->default(null),
                Select::make('customer_id')
                    ->relationship('customer', 'name')
                    ->default(null),
                DatePicker::make('calibrated_date'),
                Select::make('result')
                ->options([
                    'Laik Pakai' => 'Laik Pakai',
                    'Tidak Laik Pakai' => 'Tidak Laik Pakai',
                ]),
                Select::make('status')
                ->options(['Tersedia' => 'Tersedia', 'Tidak Tersedia' => 'Tidak Tersedia'])
                    ->default('Tersedia')
                    ->required(),
                FileUpload::make('cert_number')
                    ->disk('public')
                    ->directory('certificates')
                    ->visibility('public')
                    ->columnSpanFull(),
            ]);
    }
}
