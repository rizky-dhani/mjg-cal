<?php

namespace App\Filament\Dashboard\Resources\Roles\Pages;

use Filament\Infolists;
use Filament\Actions\Action;
use Filament\Schemas\Schema;
use Filament\Actions\EditAction;
use Spatie\Permission\Models\Role;
use Filament\Support\Icons\Heroicon;
use Filament\Forms\Components\Select;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Components\Section;
use Spatie\Permission\Models\Permission;
use Filament\Infolists\Components\TextEntry;
use App\Filament\Dashboard\Resources\Roles\RoleResource;    

class ViewRole extends ViewRecord
{
    protected static string $resource = RoleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make()
                ->successNotificationTitle('Role updated successfully'),
            Action::make('assign_permissions')
                ->form([
                    Select::make('permissions')
                        ->options(function () {
                            $roleId = $this->getRecord()->id;
                            // Get all permissions that are NOT already assigned to this role
                            $assignedPermissionIds = Role::findById($roleId)->permissions()->pluck('id')->toArray();
                            $availablePermissions = Permission::whereNotIn('id', $assignedPermissionIds)->get();
                            return $availablePermissions->pluck('name', 'id');
                        })
                        ->preload()
                        ->searchable()
                        ->multiple()
                ])
                ->action(function (array $data): void {
                    $role = $this->getRecord();
                    if (isset($data['permissions']) && !empty($data['permissions'])) {
                        $role->givePermissionTo($data['permissions']);
                    }
                })
                ->color('warning')
                ->icon(Heroicon::ArrowsRightLeft)
                ->successNotificationTitle('Selected Permission(s) assigned successfully')
        ];
    }

    public function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Role Details')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('name'),
                        TextEntry::make('guard_name')
                    ])
                    ->columnSpanFull(),
            ]);
    }
}