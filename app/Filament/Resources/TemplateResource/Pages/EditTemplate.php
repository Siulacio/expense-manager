<?php

namespace App\Filament\Resources\TemplateResource\Pages;

use App\Filament\Resources\TemplateResource;
use App\Traits\HasEditCommonMethods;
use Filament\Resources\Pages\EditRecord;

class EditTemplate extends EditRecord
{
    use HasEditCommonMethods;

    protected static string $resource = TemplateResource::class;
}
