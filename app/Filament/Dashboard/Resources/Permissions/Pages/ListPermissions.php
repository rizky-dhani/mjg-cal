<?php

namespace App\Filament\Dashboard\Resources\Permissions\Pages;

use App\Services\GeneratePermissionsService;
use Filament\Support\Enums\Width;
use Filament\Actions\{
    Action,
    CreateAction
};
use Filament\Resources\Pages\ListRecords;
use App\Filament\Dashboard\Resources\Permissions\PermissionResource;

class ListPermissions extends ListRecords
{
    protected static string $resource = PermissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('generate_permissions')
                ->label('Generate Permissions')
                ->button()
                ->color('primary')
                ->action(function (): void {
                    $service = app(GeneratePermissionsService::class);
                    $generatedPermissions = $service->generate();

                    if (count($generatedPermissions) > 0) {
                        $this->notify('success', count($generatedPermissions) . ' permissions generated successfully!');
                    } else {
                        $this->notify('info', 'No new permissions were generated.');
                    }
                })
                ->requiresConfirmation()
                ->modalHeading('Generate Permissions')
                ->modalDescription('This will automatically generate permissions based on your application models and controllers. Do you want to continue?')
                ->modalSubmitActionLabel('Generate'),
            CreateAction::make()
                ->modalWidth(Width::SevenExtraLarge)
                ->successNotificationTitle('Permission created successfully'),
        ];
    }
}
