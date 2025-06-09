<?php

declare(strict_types=1);

namespace App\Filament\Resources\ExpenseResource\Actions;

use App\Enums\ExpenseStatus;
use App\Models\Expense;
use Filament\Notifications\Notification;

class ToggleStateAction
{
    public static function execute(Expense $record): void
    {
        match ($record->status()) {
            ExpenseStatus::PENDING->value => $record->setStatus(ExpenseStatus::PAID->value),
            ExpenseStatus::PAID->value => $record->setStatus(ExpenseStatus::PENDING->value),
        };

        $record->save();

        Notification::make()
            ->title(trans('template.messages.copied.title'))
            ->body(trans('template.messages.copied.body'))
            ->success()
            ->send();
    }
}
