<?php

namespace App\Filament\Dashboard\Resources\DeviceNames;

use App\Filament\Dashboard\Resources\DeviceNames\Pages\ListDeviceNames;
use App\Filament\Dashboard\Resources\DeviceNames\Schemas\DeviceNameForm;
use App\Filament\Dashboard\Resources\DeviceNames\Tables\DeviceNamesTable;
use App\Models\DeviceName;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class DeviceNameResource extends Resource
{
    protected static ?string $model = DeviceName::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|UnitEnum|null $navigationGroup = 'Devices';

    protected static ?string $navigationParentItem = 'Devices';

    protected static ?string $navigationLabel = 'Names';

    public static function form(Schema $schema): Schema
    {
        return DeviceNameForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DeviceNamesTable::configure($table);
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
            'index' => ListDeviceNames::route('/'),
        ];
    }
}
