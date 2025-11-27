<?php

namespace App\Filament\Dashboard\Resources\Roles;

use UnitEnum;
use BackedEnum;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Spatie\Permission\Models\Role;
use Filament\Support\Icons\Heroicon;
use App\Filament\Dashboard\Resources\Roles\Pages\ViewRole;
use App\Filament\Dashboard\Resources\Roles\Pages\ListRoles;
use App\Filament\Dashboard\Resources\Roles\Schemas\RoleForm;
use App\Filament\Dashboard\Resources\Roles\Tables\RolesTable;
use App\Filament\Dashboard\Resources\Roles\RelationManagers\PermissionsRelationManager;

class RoleResource extends Resource
{
    protected static ?string $model = Role::class;
    protected static ?string $recordTitleAttribute = 'name';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::Users;
    protected static string|UnitEnum|null $navigationGroup = 'User Management';
    public static function canViewAny(): bool
    {
        $user = auth()->user();
        return $user->hasRole('Super Admin');
    }

    public static function form(Schema $schema): Schema
    {
        return RoleForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RolesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            PermissionsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListRoles::route('/'),
            'view' => ViewRole::route('/{record}'),
        ];
    }
}
