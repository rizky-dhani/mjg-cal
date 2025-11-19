<?php

namespace App\Filament\Dashboard\Resources\Customers\Pages;

use App\Filament\Dashboard\Resources\Customers\CustomerResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCustomer extends CreateRecord
{
    protected static string $resource = CustomerResource::class;
}
