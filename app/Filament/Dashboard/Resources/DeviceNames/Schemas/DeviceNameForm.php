<?php

namespace App\Filament\Dashboard\Resources\DeviceNames\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class DeviceNameForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->columnSpanFull()
                    ->required(),
            ]);
    }
}
