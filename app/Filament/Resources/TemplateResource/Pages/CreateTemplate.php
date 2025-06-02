<?php

namespace App\Filament\Resources\TemplateResource\Pages;

use App\Filament\Resources\TemplateResource;
use App\Traits\HasCreateCommonMethods;
use Filament\Resources\Pages\CreateRecord;

class CreateTemplate extends CreateRecord
{
    use HasCreateCommonMethods;

    protected static string $resource = TemplateResource::class;
}
