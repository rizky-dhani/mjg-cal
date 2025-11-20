<?php

namespace App\Filament\Dashboard\Resources\Inventories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class InventoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('inventory_number')
                    ->required(),
                TextInput::make('device_id')
                    ->required()
                    ->numeric(),
                TextInput::make('customer_id')
                    ->required()
                    ->numeric(),
                TextInput::make('location')
                    ->default(null),
                TextInput::make('status')
                    ->required()
                    ->default('available'),
            ]);
    }
}
