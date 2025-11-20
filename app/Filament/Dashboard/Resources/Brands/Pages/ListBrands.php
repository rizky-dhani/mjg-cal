<?php

namespace App\Filament\Dashboard\Resources\Brands\Pages;

use App\Filament\Dashboard\Resources\Brands\BrandResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Enums\Width;

class ListBrands extends ListRecords
{
    protected static string $resource = BrandResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->modalWidth(Width::SevenExtraLarge)
                ->successNotificationTitle('Brand created successfully'),
        ];
    }
}
