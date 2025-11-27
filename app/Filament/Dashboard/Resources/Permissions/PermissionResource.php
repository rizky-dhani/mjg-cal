<?php

namespace App\Filament\Dashboard\Resources\Permissions;

use App\Filament\Dashboard\Resources\Permissions\Pages\ListPermissions;
use App\Filament\Dashboard\Resources\Permissions\Schemas\PermissionForm;
use App\Filament\Dashboard\Resources\Permissions\Tables\PermissionsTable;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use App\Models\Permission;

class PermissionResource extends Resource
{
    protected static ?string $model = Permission::class;
    protected static ?string $recordTitleAttribute = 'name';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::LockClosed;
    protected static string|UnitEnum|null $navigationGroup = 'User Management';
    public static function canViewAny(): bool
    {
        $user = auth()->user();
        return $user->hasRole('Super Admin');
    }

    public static function form(Schema $schema): Schema
    {
        return PermissionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PermissionsTable::configure($table);
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
            'index' => ListPermissions::route('/'),
        ];
    }
}
