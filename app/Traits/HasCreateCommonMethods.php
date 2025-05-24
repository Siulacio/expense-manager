<?php

declare(strict_types=1);

namespace App\Traits;

use Filament\Notifications\Notification;

trait HasCreateCommonMethods
{
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction()->label(trans('general.actions.save')),
            $this->getCancelFormAction()->label(trans('general.actions.cancel')),
        ];
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->title(trans(getModelName($this->getModel()) . '.messages.created.title'))
            ->body(trans(getModelName($this->getModel()) . '.messages.created.body'))
            ->success()
            ->send();
    }
}
