<?php

namespace App\Filament\Dashboard\Resources\Types;

use App\Filament\Dashboard\Resources\Types\Pages\CreateType;
use App\Filament\Dashboard\Resources\Types\Pages\EditType;
use App\Filament\Dashboard\Resources\Types\Pages\ListTypes;
use App\Filament\Dashboard\Resources\Types\Schemas\TypeForm;
use App\Filament\Dashboard\Resources\Types\Tables\TypesTable;
use App\Models\Type;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TypeResource extends Resource
{
    protected static ?string $model = Type::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static string|UnitEnum|null $navigationGroup = 'Devices';
    protected static ?string $navigationParentItem = 'Devices';

    public static function form(Schema $schema): Schema
    {
        return TypeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TypesTable::configure($table);
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
            'index' => ListTypes::route('/'),
        ];
    }
}
