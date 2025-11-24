<?php

namespace App\Filament\Dashboard\Resources\Types\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('brand_id')
                    ->label('Brand')
                    ->relationship('brand', 'name')
                    ->preload()
                    ->required(),
                TextInput::make('name')
                    ->required(),
            ]);
    }
}
