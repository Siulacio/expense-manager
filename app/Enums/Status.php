<?php

declare(strict_types=1);

namespace App\Enums;

enum Status: string
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';

    public static function toArray(): array
    {
        return [
            self::ACTIVE->value => trans('general.status.' . self::ACTIVE->value),
            self::INACTIVE->value => trans('general.status.' . self::INACTIVE->value),
        ];
    }

    public static function values(): array
    {
        return [
            self::ACTIVE->value,
            self::INACTIVE->value,
        ];
    }
}
