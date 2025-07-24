<?php

declare(strict_types=1);

namespace App\Pipes;

use Filament\Notifications\Notification;

class NotifyPipe
{
    public function handle($data, \Closure $next)
    {
        if ($data['expenses']->isEmpty()) {
            Notification::make()
                ->body(trans('expense.mail.messages.error'))
                ->danger()
                ->send();
        } else {
            Notification::make()
                ->body(trans('expense.mail.messages.success'))
                ->success()
                ->send();
        }

        return $next($data);
    }
}
