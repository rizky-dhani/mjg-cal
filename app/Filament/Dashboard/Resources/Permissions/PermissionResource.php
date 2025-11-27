<?php

namespace App\Filament\Dashboard\Resources\Permissions;

use UnitEnum;
use BackedEnum;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Spatie\Permission\Models\Permission;
use App\Filament\Dashboard\Resources\Permissions\Pages\ListPermissions;
use App\Filament\Dashboard\Resources\Permissions\Schemas\PermissionForm;
use App\Filament\Dashboard\Resources\Permissions\Tables\PermissionsTable;

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
