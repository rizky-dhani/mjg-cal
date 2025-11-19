<?php

namespace App\Filament\Dashboard\Resources\Logbooks\Pages;

use App\Filament\Dashboard\Resources\Logbooks\LogbookResource;
use Filament\Resources\Pages\CreateRecord;

class CreateLogbook extends CreateRecord
{
    protected static string $resource = LogbookResource::class;
}
