<?php

declare(strict_types=1);

namespace App\Enums;

enum Months: string
{
    case JANUARY = 'January';
    case FEBRUARY = 'February';
    case MARCH = 'March';
    case APRIL = 'April';
    case MAY = 'May';
    case JUNE = 'June';
    case JULY = 'July';
    case AUGUST = 'August';
    case SEPTEMBER = 'September';
    case OCTOBER = 'October';
    case NOVEMBER = 'November';
    case DECEMBER = 'December';

    public static function forFilter(): array
    {
        return [
            1 => trans('general.months.' . self::JANUARY->value),
            2 => trans('general.months.' . self::FEBRUARY->value),
            3 => trans('general.months.' . self::MARCH->value),
            4 => trans('general.months.' . self::APRIL->value),
            5 => trans('general.months.' . self::MAY->value),
            6 => trans('general.months.' . self::JUNE->value),
            7 => trans('general.months.' . self::JULY->value),
            8 => trans('general.months.' . self::AUGUST->value),
            9 => trans('general.months.' . self::SEPTEMBER->value),
            10 => trans('general.months.' . self::OCTOBER->value),
            11 => trans('general.months.' . self::NOVEMBER->value),
            12 => trans('general.months.' . self::DECEMBER->value),
        ];
    }
}
