<?php

declare(strict_types=1);

namespace App\Filament\Resources\ExpenseResource\ViewModels;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Collection;

class ExpenseViewModel implements Arrayable
{
    private Collection $expenses;
    private array $data = [];

    public function __construct(Collection $expenses, array $data)
    {
        $this->expenses = $expenses;
        $this->data = $data;
    }

    public function toArray(): array
    {
        return [
            'title' => trans('expense.mail.title'),
            'expenses_count' => $this->expenses->count(),
            'alt_expenses' => $this->transformExpenses(),
            'period' => $this->getPeriod(),
            'total_expenses' => $this->getTotalAmount(),
            'average_expense' => $this->getAverageAmount(),
        ];
    }

    private function transformExpenses(): array
    {
        return array_map(function ($expense) {
            return [
                'name' => $expense['name'],
                'amount' => number_format($expense['amount'], 0, ',', '.'),
                'date' => Carbon::parse($expense['date'])->format('d M Y'),
            ];
        }, $this->expenses->toArray());
    }

    private function getTotalAmount(): string
    {
        return number_format($this->expenses->sum('amount'), 0, ',', '.');
    }

    private function getAverageAmount(): string
    {
        return number_format($this->expenses->avg('amount'), 0, ',', '.');
    }

    private function getPeriod(): string
    {
        return ucfirst(Carbon::parse($this->data['start_date'])->translatedFormat('F Y'));
    }
}
