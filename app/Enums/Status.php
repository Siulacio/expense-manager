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

    public static function color(string $status): string
    {
        return match (self::from($status)) {
            self::ACTIVE => 'success',
            self::INACTIVE => 'danger',
        };
    }

    public static function translation(string $value): string
    {
        return match (self::from($value)) {
            self::ACTIVE => trans('general.status.' . self::ACTIVE->value),
            self::INACTIVE => trans('general.status.' . self::INACTIVE->value),
        };
    }
}
