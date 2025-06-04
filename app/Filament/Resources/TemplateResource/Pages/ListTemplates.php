<?php

namespace App\Filament\Resources\TemplateResource\Pages;

use App\Filament\Resources\TemplateResource;
use App\Models\{CostCenter, PaymentMethod, Template, TemplateItem};
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListTemplates extends ListRecords
{
    protected static string $resource = TemplateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getTableQuery(): ?Builder
    {
        return parent::getTableQuery()
            ->select(
                'templates.' . Template::ID,
                'templates.' . Template::NAME,
                'templates.' . Template::USER_ID,
                'template_items.' . TemplateItem::ID . ' as item_id',
                'template_items.' . TemplateItem::NAME . ' as item_name',
                'template_items.' . TemplateItem::AMOUNT . ' as item_amount',
                'template_items.' . TemplateItem::TEMPLATE_ID . ' as item_template_id',
                'template_items.' . TemplateItem::COST_CENTER_ID . ' as item_cost_center_id',
                'template_items.' . TemplateItem::PAYMENT_METHOD_ID . ' as item_payment_method_id',
                'cost_centers.' . CostCenter::NAME . ' as item_cost_center_name',
                'payment_methods.' . PaymentMethod::NAME . ' as item_payment_method_name',
            )
            ->leftJoin('template_items', 'templates.id', '=', 'template_items.template_id')
            ->leftJoin('cost_centers', 'template_items.cost_center_id', '=', 'cost_centers.id')
            ->leftJoin('payment_methods', 'template_items.payment_method_id', '=', 'payment_methods.id');
    }
}
