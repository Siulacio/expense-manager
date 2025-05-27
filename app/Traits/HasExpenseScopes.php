<?php

declare(strict_types=1);

namespace App\Traits;

use App\Models\Expense;
use Illuminate\Database\Eloquent\Builder;

trait HasExpenseScopes
{
    public static function scopeFilterByMonth($query, array $data): Builder
    {
        if (!$data['value']) {
            return $query;
        }

        return $query->whereMonth(self::DATE, $data['value'])
            ->whereYear(self::DATE, date('Y'));
    }

    public static function scopeFilterByDateRange($query, array $data): Builder
    {
        return $query
            ->when(
                $data['from'],
                fn (Builder $query, $date): Builder => $query->whereDate(self::DATE, '>=', $date),
            )
            ->when(
                $data['until'],
                fn (Builder $query, $date): Builder => $query->whereDate(self::DATE, '<=', $date),
            );
    }

    public static function scopeFilterByPeriodPreset($query, array $data): Builder
    {
        if (!$data['value']) {
            return $query;
        }

        return match ($data['value']) {
            'current_month' => $query->whereMonth(Expense::DATE, now()->month)->whereYear(Expense::DATE, now()->year),
            'last_month' => $query->whereMonth(Expense::DATE, now()->subMonth()->month)->whereYear(Expense::DATE, now()->subMonth()->year),
            'last_3_months' => $query->where(Expense::DATE, '>=', now()->subMonths(3)->startOfMonth()),
            'last_6_months' => $query->where(Expense::DATE, '>=', now()->subMonths(6)->startOfMonth()),
            'current_year' => $query->whereYear(Expense::DATE, now()->year),
            default => $query,
        };
    }
}
