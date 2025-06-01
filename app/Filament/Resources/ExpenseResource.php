<?php

namespace App\Filament\Resources;

use App\Const\HeroIcons;
use App\Enums\ExpenseStatus;
use App\Filament\Resources\ExpenseResource\Pages;
use App\Filament\Resources\ExpenseResource\Tables\ExpenseTable;
use App\Models\Expense;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;

class ExpenseResource extends Resource
{
    protected static ?string $model = Expense::class;

    protected static ?string $navigationIcon = HeroIcons::PRESENTATION_CHART_LINE;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make(Expense::NAME)
                    ->label(trans('expense.fields.name'))
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make(Expense::AMOUNT)
                    ->label(trans('expense.fields.amount'))
                    ->required()
                    ->numeric(),
                Forms\Components\DatePicker::make(Expense::DATE)
                    ->label(trans('expense.fields.date'))
                    ->default(now()->format('Y-m-d')),
                Forms\Components\Select::make(Expense::STATUS)
                    ->label(trans('expense.fields.status'))
                    ->options(ExpenseStatus::toArray())
                    ->required(),
                Forms\Components\Select::make(Expense::COST_CENTER_ID)
                    ->label(trans('expense.fields.cost_center'))
                    ->relationship('costCenter', 'name')
                    ->required(),
                Forms\Components\Select::make(Expense::PAYMENT_METHOD_ID)
                    ->label(trans('expense.fields.payment_method'))
                    ->relationship('paymentMethod', 'name')
                    ->required(),
                Forms\Components\Select::make(Expense::USER_ID)
                    ->label(trans('expense.fields.user'))
                    ->relationship('user', 'name')
                    ->required()
                    ->disabled()
                    ->dehydrated()
                    ->default(auth()->user()->getAuthIdentifier()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return ExpenseTable::make($table);
    }

    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListExpenses::route('/'),
            'create' => Pages\CreateExpense::route('/create'),
            'edit' => Pages\EditExpense::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return trans('expense.entity');
    }
}
