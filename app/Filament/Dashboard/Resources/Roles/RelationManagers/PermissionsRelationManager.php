<?php

namespace App\Filament\Dashboard\Resources\Roles\RelationManagers;

use App\Filament\Dashboard\Resources\Permissions\PermissionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class PermissionsRelationManager extends RelationManager
{
    protected static string $relationship = 'permissions';

    protected static ?string $relatedResource = PermissionResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}
