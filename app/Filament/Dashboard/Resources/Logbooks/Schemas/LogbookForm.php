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
                    ->label(__('logbooks.form.inventory_id.label'))
                    ->relationship('inventory', 'name')
                    ->getOptionLabelFromRecordUsing(fn($record) => "{$record->inventory_number} - {$record->deviceName->name}")
                    ->preload()
                    ->searchable()
                    ->columnSpanFull()
                    ->required(),
                Textarea::make('accessories')
                    ->label(__('logbooks.form.accessories.label'))
                    ->autosize()
                    ->columnSpanFull(),
                DatePicker::make('start_date')
                    ->label(__('logbooks.form.start_date.label'))
                    ->native(false)
                    ->displayFormat('d/m/Y')
                    ->format('Y-m-d')
                    ->closeOnDateSelection()
                    ->required(),
                DatePicker::make('end_date')
                    ->label(__('logbooks.form.end_date.label'))
                    ->native(false)
                    ->displayFormat('d/m/Y')
                    ->format('Y-m-d')
                    ->closeOnDateSelection()
                    ->required(),
                Select::make('location_id')
                    ->label(__('logbooks.form.location_id.label'))
                    ->relationship('location', 'name')
                    ->preload()
                    ->searchable()
                    ->required(),
                Select::make('pic_id')
                    ->label(__('logbooks.form.pic_id.label'))
                    ->relationship('pic', 'name')
                    ->preload()
                    ->searchable()
                    ->required(),
            ]);
    }
}
