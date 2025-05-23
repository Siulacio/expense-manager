<?php

declare(strict_types=1);

namespace App\Enums;

enum ExpenseStatus: string
{
    case PAID = 'paid';
    case PENDING = 'pending';

    public static function toArray(): array
    {
        return [
            self::PAID->value => self::PAID->value,
            self::PENDING->value => self::PENDING->value,
        ];
    }

    public static function values(): array
    {
        return [
            self::PAID->value,
            self::PENDING->value,
        ];
    }
}
