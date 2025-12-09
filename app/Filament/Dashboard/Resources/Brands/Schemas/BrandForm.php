<?php

namespace App\Filament\Dashboard\Resources\Brands\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BrandForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label(__('brands.form.name.label'))
                    ->columnSpanFull()
                    ->required(),
            ]);
    }
}
