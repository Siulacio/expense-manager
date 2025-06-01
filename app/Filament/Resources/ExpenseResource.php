<?php

namespace App\Filament\Resources;

use App\Const\HeroIcons;
use App\Filament\Resources\ExpenseResource\Forms\ExpenseForm;
use App\Filament\Resources\ExpenseResource\Pages;
use App\Filament\Resources\ExpenseResource\Tables\ExpenseTable;
use App\Models\Expense;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;

class ExpenseResource extends Resource
{
    protected static ?string $model = Expense::class;

    protected static ?string $navigationIcon = HeroIcons::PRESENTATION_CHART_LINE;

    public static function form(Form $form): Form
    {
        return ExpenseForm::make($form);
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
