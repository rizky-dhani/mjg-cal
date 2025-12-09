<?php

namespace App\Filament\Dashboard\Resources\Users\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DateTimePicker;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label(__('users.form.name.label'))
                    ->required(),
                TextInput::make('email')
                    ->label(__('users.form.email.label'))
                    ->email()
                    ->required(),
                TextInput::make('initial')
                    ->label(__('users.form.initial.label'))
                    ->required(),
                Select::make('roles')
                    ->label(__('users.form.roles.label'))
                    ->multiple()
                    ->relationship('roles', 'name', fn($query) => $query->where('id', '!=', 1))
                    ->preload()
            ]);
    }
}
