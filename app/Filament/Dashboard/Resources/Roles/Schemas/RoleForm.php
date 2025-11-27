<?php

namespace App\Filament\Dashboard\Resources\Roles\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class RoleForm
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
                Select::make('permissions')
                    ->multiple()
                    ->relationship('permissions', 'name')
                    ->preload()
                    ->label('Permissions')
                    ->helperText('Select permissions to assign to this role')
                    ->columnSpanFull(),
            ]);
    }
}
