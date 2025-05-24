<?php

namespace App\Filament\Resources\CostCenterResource\Pages;

use App\Filament\Resources\CostCenterResource;
use App\Traits\HasCreateCommonMethods;
use Filament\Resources\Pages\CreateRecord;

class CreateCostCenter extends CreateRecord
{
    use HasCreateCommonMethods;
    protected static string $resource = CostCenterResource::class;
}
