<?php

namespace App\Filament\Dashboard\Resources\Customers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class CustomerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label(__('customers.form.name.label'))
                    ->required(),
                TextInput::make('phone_number')
                    ->label(__('customers.form.phone_number.label'))
                    ->tel()
                    ->default(null),
                Textarea::make('address')
                    ->label(__('customers.form.address.label'))
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
