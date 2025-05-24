<?php

declare(strict_types=1);

namespace App\Traits;

use Filament\Actions\DeleteAction;
use Filament\Notifications\Notification;

trait HasEditCommonMethods
{
    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->title(trans(getModelName($this->getModel()) . '.messages.updated.title'))
            ->body(trans(getModelName($this->getModel()) . '.messages.updated.body'))
            ->success()
            ->send();
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->label(trans('general.actions.delete'))
                ->modalHeading(trans('general.actions.delete-item', ['item' => trans(getModelName($this->getModel()) . '.entity')]))
                ->successNotification(
                    Notification::make()
                        ->title(trans(getModelName($this->getModel()) . '.messages.deleted.title'))
                        ->body(trans(getModelName($this->getModel()) . '.messages.deleted.body'))
                        ->success()
                ),
        ];
    }
}
