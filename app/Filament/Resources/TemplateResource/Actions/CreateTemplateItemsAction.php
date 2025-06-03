<?php

declare(strict_types=1);

namespace App\Filament\Resources\TemplateResource\Actions;

use App\Models\{Template, TemplateItem};

class CreateTemplateItemsAction
{
    public static function execute(array $data, Template $template): void
    {
        /** @var TemplateItem $item */
        foreach ($data['items'] as $item) {
            TemplateItem::create([
                TemplateItem::NAME => $item['name'],
                TemplateItem::AMOUNT => $item['amount'],
                TemplateItem::TEMPLATE_ID => $template->id(),
                TemplateItem::COST_CENTER_ID => $item['cost_center_id'],
                TemplateItem::PAYMENT_METHOD_ID => $item['payment_method_id'],
            ]);
        }
    }
}
