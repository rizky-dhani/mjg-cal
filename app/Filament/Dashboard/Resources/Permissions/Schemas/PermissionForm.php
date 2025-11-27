<?php

namespace App\Filament\Dashboard\Resources\Permissions\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class PermissionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                Select::make('guard_name')
                    ->options([
                        'web' => 'web'
                    ])
                    ->default('web')
                    ->required(),
            ]);
    }
}
