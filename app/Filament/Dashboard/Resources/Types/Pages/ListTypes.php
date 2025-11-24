<?php

namespace App\Filament\Dashboard\Resources\Types\Pages;

use Filament\Support\Enums\Width;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Dashboard\Resources\Types\TypeResource;

class ListTypes extends ListRecords
{
    protected static string $resource = TypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->modalWidth(Width::SevenExtraLarge)
                ->successNotificationTitle('Type created successfully'),
        ];
    }
}
