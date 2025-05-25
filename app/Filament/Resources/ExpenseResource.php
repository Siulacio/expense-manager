<?php

namespace App\Filament\Resources;

use App\Const\HeroIcons;
use App\Enums\ExpenseStatus;
use App\Filament\Resources\ExpenseResource\Pages;
use App\Models\{CostCenter, Expense, PaymentMethod, User};
use Filament\Forms\Form;
use Filament\{Forms, Notifications\Notification, Tables};
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
        return $table
            ->columns([
                Tables\Columns\TextColumn::make(Expense::NAME)
                    ->label(trans('expense.fields.name'))
                    ->searchable(),
                Tables\Columns\TextColumn::make(Expense::AMOUNT)
                    ->label(trans('expense.fields.amount'))
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make(Expense::DATE)
                    ->label(trans('expense.fields.date'))
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make(Expense::STATUS)
                    ->label(trans('expense.fields.status'))
                    ->badge()
                    ->color(fn ($state): string => ExpenseStatus::color($state))
                    ->formatStateUsing(fn ($state): string => ExpenseStatus::translation($state)),
                Tables\Columns\TextColumn::make(Expense::CREATED_AT)
                    ->label(trans('general.timestamps.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make(Expense::UPDATED_AT)
                    ->label(trans('general.timestamps.updated_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('costCenter.name')
                    ->label(trans('expense.fields.cost_center'))
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('paymentMethod.name')
                    ->label(trans('expense.fields.payment_method'))
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label(trans('expense.fields.user'))
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make(Expense::STATUS)
                    ->label(trans('expense.fields.status'))
                    ->placeholder(trans('expense.fields.status'))
                    ->options(ExpenseStatus::toArray()),
                Tables\Filters\SelectFilter::make(Expense::COST_CENTER_ID)
                    ->label(trans('expense.fields.cost_center'))
                    ->placeholder(trans('expense.fields.cost_center'))
                    ->options(CostCenter::query()->get()->pluck('name', 'id')->toArray()),
                Tables\Filters\SelectFilter::make(Expense::PAYMENT_METHOD_ID)
                    ->label(trans('expense.fields.payment_method'))
                    ->placeholder(trans('expense.fields.payment_method'))
                    ->options(PaymentMethod::query()->get()->pluck('name', 'id')->toArray()),
                Tables\Filters\SelectFilter::make(Expense::USER_ID)
                    ->label(trans('expense.fields.user'))
                    ->placeholder(trans('expense.fields.user'))
                    ->options(User::query()->get()->pluck('name', 'id')->toArray()),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->button()
                    ->color('primary'),
                Tables\Actions\DeleteAction::make()
                    ->button()
                    ->color('danger')
                    ->label(trans('general.actions.delete'))
                    ->modalHeading(trans('general.actions.delete-item', ['item' => trans('expense.entity')]))
                    ->successNotification(
                        Notification::make()
                            ->title(trans('expense.messages.deleted.title'))
                            ->body(trans('expense.messages.deleted.body'))
                            ->success()
                    ),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
