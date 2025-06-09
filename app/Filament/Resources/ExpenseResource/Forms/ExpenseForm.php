<?php

declare(strict_types=1);

namespace App\Filament\Resources\ExpenseResource\Forms;

use App\Components\AmountTextInput;
use App\Enums\ExpenseStatus;
use App\Models\Expense;
use Filament\Forms\Components\{DatePicker, Select, TextInput};
use Filament\Forms\Form;

class ExpenseForm
{
    public static function make(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make(Expense::NAME)
                    ->label(trans('expense.fields.name'))
                    ->required()
                    ->maxLength(100),
                AmountTextInput::make(Expense::AMOUNT),
                DatePicker::make(Expense::DATE)
                    ->label(trans('expense.fields.date'))
                    ->default(now()->format('Y-m-d')),
                Select::make(Expense::STATUS)
                    ->label(trans('expense.fields.status'))
                    ->options(ExpenseStatus::toArray())
                    ->required(),
                Select::make(Expense::COST_CENTER_ID)
                    ->label(trans('expense.fields.cost_center'))
                    ->relationship('costCenter', 'name')
                    ->required(),
                Select::make(Expense::PAYMENT_METHOD_ID)
                    ->label(trans('expense.fields.payment_method'))
                    ->relationship('paymentMethod', 'name')
                    ->required(),
                Select::make(Expense::USER_ID)
                    ->label(trans('expense.fields.user'))
                    ->relationship('user', 'name')
                    ->required()
                    ->disabled()
                    ->dehydrated()
                    ->default(auth()->user()->getAuthIdentifier()),
            ]);
    }
}
