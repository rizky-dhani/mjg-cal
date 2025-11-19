<?php

namespace App\Filament\Dashboard\Resources\Logbooks\Pages;

use App\Filament\Dashboard\Resources\Logbooks\LogbookResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLogbooks extends ListRecords
{
    protected static string $resource = LogbookResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
