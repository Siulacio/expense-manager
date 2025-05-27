<?php

namespace App\Components;

use App\Enums\Months;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;

class MonthFilter extends SelectFilter
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->label(trans('expense.fields.month'));
        $this->placeholder(trans('expense.filters.month'));
        $this->options(Months::forFilter());
        $this->query(fn (Builder $query, array $data) => $query->filterByMonth($data));
    }
}
