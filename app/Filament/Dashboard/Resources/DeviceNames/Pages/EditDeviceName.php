<?php

namespace App\Filament\Dashboard\Resources\DeviceNames\Pages;

use App\Filament\Dashboard\Resources\DeviceNames\DeviceNameResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDeviceName extends EditRecord
{
    protected static string $resource = DeviceNameResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
