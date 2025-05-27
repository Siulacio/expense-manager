<?php

declare(strict_types=1);

namespace App\Components;

use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;

class DateRangeFilter extends SelectFilter
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->form([
            DatePicker::make('from')->label(trans('expense.fields.from')),
            DatePicker::make('until')->label(trans('expense.fields.until')),
        ]);
        $this->query(fn (Builder $query, array $data) => $query->filterByDateRange($data));
    }
}
