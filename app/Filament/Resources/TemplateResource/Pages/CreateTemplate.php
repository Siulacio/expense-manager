<?php

namespace App\Filament\Resources\TemplateResource\Pages;

use App\Filament\Resources\TemplateResource;
use App\Filament\Resources\TemplateResource\Actions\{CreateTemplateAction, CreateTemplateItemsAction};
use App\Traits\HasCreateCommonMethods;
use Filament\Resources\Pages\CreateRecord;

class CreateTemplate extends CreateRecord
{
    use HasCreateCommonMethods;

    protected static string $resource = TemplateResource::class;

    public function create(bool $another = false): void
    {
        parent::create($another);

        $data = $this->form->getState();

        $template = CreateTemplateAction::execute($data);
        CreateTemplateItemsAction::execute($data, $template);

        $this->getRedirectUrl();
    }
}
