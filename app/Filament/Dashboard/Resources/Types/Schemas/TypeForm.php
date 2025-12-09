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
                    ->label(__('types.form.brand_id.label'))
                    ->relationship('brand', 'name')
                    ->createOptionModalHeading(__('types.form.create_brand_modal_heading'))
                    ->createOptionForm([
                        TextInput::make('name')
                            ->label(__('types.form.name.label'))
                            ->columnSpanFull()
                            ->required(),
                    ])
                    ->preload()
                    ->required(),
                TextInput::make('name')
                    ->label(__('types.form.name.label'))
                    ->required(),
            ]);
    }
}
