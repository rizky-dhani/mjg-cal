<?php

namespace App\Filament\Dashboard\Resources\Logbooks\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class LogbookForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('inventory_id')
                    ->label('Inventory')
                    ->relationship('inventory', 'name')
                    ->getOptionLabelFromRecordUsing(fn($record) => "{$record->inventory_number} - {$record->deviceName->name}")
                    ->preload()
                    ->searchable()
                    ->columnSpanFull()
                    ->required(),
                Textarea::make('accessories')
                    ->autosize()
                    ->columnSpanFull(),
                DatePicker::make('start_date')
                    ->label('Start')
                    ->native(false)
                    ->displayFormat('d/m/Y')
                    ->format('Y-m-d')
                    ->closeOnDateSelection()
                    ->required(),
                DatePicker::make('end_date')
                    ->label('End')
                    ->native(false)
                    ->displayFormat('d/m/Y')
                    ->format('Y-m-d')
                    ->closeOnDateSelection()
                    ->required(),
                Select::make('location_id')
                    ->label('Location')
                    ->relationship('location', 'name')
                    ->preload()
                    ->searchable()
                    ->required(),
                Select::make('pic_id')
                    ->label('PIC')
                    ->relationship('pic', 'name')
                    ->preload()
                    ->searchable()
                    ->required(),
            ]);
    }
}
