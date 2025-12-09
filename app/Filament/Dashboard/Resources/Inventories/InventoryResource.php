<?php

namespace App\Filament\Dashboard\Resources\Inventories;

use App\Filament\Dashboard\Resources\Inventories\Pages\ListInventories;
use App\Filament\Dashboard\Resources\Inventories\Schemas\InventoryForm;
use App\Filament\Dashboard\Resources\Inventories\Tables\InventoriesTable;
use App\Models\Inventory;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class InventoryResource extends Resource
{
    protected static ?string $model = Inventory::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::ArchiveBox;

    public static function getModelLabel(): string
    {
        return __('inventories.label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('inventories.plural_label');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('navigation.Inventories');
    }

    public static function form(Schema $schema): Schema
    {
        return InventoryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return InventoriesTable::configure($table);
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
            'index' => ListInventories::route('/'),
        ];
    }
}
