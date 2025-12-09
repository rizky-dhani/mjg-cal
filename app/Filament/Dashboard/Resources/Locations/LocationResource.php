<?php

namespace App\Filament\Dashboard\Resources\Locations;

use App\Filament\Dashboard\Resources\Locations\Pages\CreateLocation;
use App\Filament\Dashboard\Resources\Locations\Pages\EditLocation;
use App\Filament\Dashboard\Resources\Locations\Pages\ListLocations;
use App\Filament\Dashboard\Resources\Locations\Schemas\LocationForm;
use App\Filament\Dashboard\Resources\Locations\Tables\LocationsTable;
use App\Models\Location;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class LocationResource extends Resource
{
    protected static ?string $model = Location::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function getModelLabel(): string
    {
        return __('locations.label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('locations.plural_label');
    }

    public static function getNavigationLabel(): string
    {
        return __('locations.navigation_label');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('navigation.Devices');
    }

    public static function getNavigationParentItem(): ?string
    {
        return __('navigation.Devices');
    }

    public static function form(Schema $schema): Schema
    {
        return LocationForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LocationsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListLocations::route('/'),
        ];
    }
}
