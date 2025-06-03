<?php

declare(strict_types=1);

namespace App\Filament\Resources\TemplateResource\Actions;

use App\Models\Template;

class CreateTemplateAction
{
    public static function execute(array $data): Template
    {
        return Template::create([
            Template::NAME => $data['name'],
            Template::USER_ID => $data['user_id'],
        ]);
    }
}
