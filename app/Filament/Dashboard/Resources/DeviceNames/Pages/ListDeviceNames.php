<?php

namespace App\Filament\Dashboard\Resources\DeviceNames\Pages;

use App\Filament\Dashboard\Resources\DeviceNames\DeviceNameResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Enums\Width;

class ListDeviceNames extends ListRecords
{
    protected static string $resource = DeviceNameResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->color('success')
                ->modalWidth(Width::SevenExtraLarge)
                ->successNotificationTitle(__('devicenames.actions.create_success', ['label' => __('devicenames.label')])),
        ];
    }
}
