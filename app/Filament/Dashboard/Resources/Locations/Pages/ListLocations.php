<?php

namespace App\Filament\Dashboard\Resources\Locations\Pages;

use App\Filament\Dashboard\Resources\Locations\LocationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Enums\Width;

class ListLocations extends ListRecords
{
    protected static string $resource = LocationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->modalWidth(Width::SevenExtraLarge)
                ->successNotificationTitle('Location created successfully'),
        ];
    }
}
