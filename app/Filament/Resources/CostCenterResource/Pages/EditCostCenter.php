<?php

namespace App\Filament\Resources\CostCenterResource\Pages;

use App\Filament\Resources\CostCenterResource;
use App\Traits\HasEditCommonMethods;
use Filament\Resources\Pages\EditRecord;

class EditCostCenter extends EditRecord
{
    use HasEditCommonMethods;
    protected static string $resource = CostCenterResource::class;
}
