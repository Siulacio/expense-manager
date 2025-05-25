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
            self::PAID->value => trans('general.status.' . self::PAID->value),
            self::PENDING->value => trans('general.status.' . self::PENDING->value),
        ];
    }

    public static function values(): array
    {
        return [
            self::PAID->value,
            self::PENDING->value,
        ];
    }

    public static function color(string $status): string
    {
        return match (self::from($status)) {
            self::PAID => 'success',
            self::PENDING => 'warning',
        };
    }

    public static function translation(string $value): string
    {
        return match (self::from($value)) {
            self::PAID => trans('general.status.' . self::PAID->value),
            self::PENDING => trans('general.status.' . self::PENDING->value),
        };
    }
}
