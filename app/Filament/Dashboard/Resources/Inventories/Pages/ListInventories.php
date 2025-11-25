<?php

namespace App\Filament\Dashboard\Resources\Inventories\Pages;

use Filament\Support\Enums\Width;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Dashboard\Resources\Inventories\InventoryResource;

class ListInventories extends ListRecords
{
    protected static string $resource = InventoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->modalWidth(Width::SevenExtraLarge)
                ->successNotificationTitle('Inventories created successfully'),
        ];
    }
}
