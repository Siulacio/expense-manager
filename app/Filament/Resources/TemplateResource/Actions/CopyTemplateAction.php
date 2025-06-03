<?php

declare(strict_types=1);

namespace App\Filament\Resources\TemplateResource\Actions;

use App\Enums\ExpenseStatus;
use App\Models\{Expense, TemplateItem};
use Filament\Notifications\Notification;

class CopyTemplateAction
{
    public static function execute(array $data, $record): void
    {
        $items = $record->items()->get();

        /** @var TemplateItem $item */
        foreach ($items as $item) {
            Expense::create([
                Expense::NAME => $item->name(),
                Expense::AMOUNT => $item->amount(),
                Expense::DATE => $data['date'],
                Expense::STATUS => ExpenseStatus::PENDING->value,
                Expense::COST_CENTER_ID => $item->costCenterId(),
                Expense::PAYMENT_METHOD_ID => $item->paymentMethodId(),
                Expense::USER_ID => $record->userId(),
            ]);
        }

        Notification::make()
            ->title(trans('template.messages.copied.title'))
            ->body(trans('template.messages.copied.body'))
            ->success()
            ->send();
    }
}
