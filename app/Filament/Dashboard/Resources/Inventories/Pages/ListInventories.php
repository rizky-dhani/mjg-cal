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
                ->color('success')
                ->modalWidth(Width::SevenExtraLarge)
                ->successNotificationTitle(__('inventories.actions.create_success', ['label' => __('inventories.label')])),
        ];
    }
}
