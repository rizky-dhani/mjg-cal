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
                TextInput::make('log_number')
                    ->required(),
                DatePicker::make('date')
                    ->required(),
                TextInput::make('inventory_id')
                    ->required()
                    ->numeric(),
                Textarea::make('accessories')
                    ->default(null)
                    ->columnSpanFull(),
                DatePicker::make('start_date')
                    ->required(),
                DatePicker::make('end_date')
                    ->required(),
                TextInput::make('location')
                    ->required(),
                TextInput::make('pic_id')
                    ->required()
                    ->numeric(),
                Select::make('status')
                    ->options(['Available' => 'Available', 'Borrowed' => 'Borrowed'])
                    ->required(),
            ]);
    }
}
