<?php

namespace App\Filament\Resources\ExpenseResource\Forms;

use App\Enums\ExpenseStatus;
use App\Models\Expense;
use Filament\Forms\Components\{DatePicker, Section, Select, TextInput};

class ExportExpenseForm
{
    public static function make(): array
    {
        return [
            Section::make()
                ->schema([
                    DatePicker::make('start_date')
                        ->label(trans('expense.fields.start_date'))
                        ->required()
                        ->default(now()->startOfMonth()->format('Y-m-d')),
                    DatePicker::make('end_date')
                        ->label(trans('expense.fields.end_date'))
                        ->required()
                        ->default(now()->endOfMonth()->format('Y-m-d')),
                    Select::make(Expense::STATUS)
                        ->label(trans('expense.fields.status'))
                        ->placeholder(trans('expense.filters.status'))
                        ->options(ExpenseStatus::toArray()),
                    Select::make(Expense::COST_CENTER_ID)
                        ->label(trans('expense.fields.cost_center'))
                        ->placeholder(trans('expense.filters.cost_center'))
                        ->relationship('costCenter', 'name'),
                    TextInput::make('email')
                        ->label('email')
                        ->required()
                        ->email(),
                ])->columns(),
        ];
    }
}
