<?php

declare(strict_types=1);

namespace App\Components;

use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;

class PeriodFilter extends SelectFilter
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->label(trans('expense.fields.period'));
        $this->placeholder(trans('expense.filters.period'));
        $this->options($this->getPeriodPreset());
        $this->query(fn (Builder $query, array $data) => $query->filterByPeriodPreset($data));
    }

    public function getPeriodPreset(): array
    {
        return [
            'current_month' => trans('general.periods.current_month'),
            'last_month' => trans('general.periods.last_month'),
            'last_3_months' => trans('general.periods.last_3_months'),
            'last_6_months' => trans('general.periods.last_6_months'),
            'current_year' => trans('general.periods.current_year'),
        ];
    }
}
