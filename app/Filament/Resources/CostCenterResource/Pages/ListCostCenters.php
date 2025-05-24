<?php

namespace App\Filament\Resources\CostCenterResource\Pages;

use App\Filament\Resources\CostCenterResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCostCenters extends ListRecords
{
    protected static string $resource = CostCenterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
