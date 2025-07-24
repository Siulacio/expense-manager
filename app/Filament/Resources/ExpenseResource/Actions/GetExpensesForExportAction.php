<?php

namespace App\Filament\Resources\ExpenseResource\Actions;

use App\Models\Expense;
use Illuminate\Support\Collection;

class GetExpensesForExportAction
{
    public static function execute(array $data): Collection
    {
        return Expense::query()
            ->whereDate(Expense::DATE, '>=', $data['start_date'])
            ->whereDate(Expense::DATE, '<=', $data['end_date'])
            ->where(Expense::COST_CENTER_ID, '=', $data['cost_center_id'])
            ->where(Expense::STATUS, '=', $data['status'])
            ->get();
    }
}
