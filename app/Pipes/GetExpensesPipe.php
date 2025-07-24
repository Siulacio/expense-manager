<?php

declare(strict_types=1);

namespace App\Pipes;

use App\Filament\Resources\ExpenseResource\Actions\GetExpensesForExportAction;

class GetExpensesPipe
{
    public function handle($data, \Closure $next)
    {
        $data['expenses'] = GetExpensesForExportAction::execute($data);

        return $next($data);
    }
}
