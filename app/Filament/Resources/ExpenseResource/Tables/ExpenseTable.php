<?php

declare(strict_types=1);

namespace App\Filament\Resources\ExpenseResource\Tables;

use App\Components\{DateRangeFilter, MonthFilter, PeriodFilter};
use App\Enums\ExpenseStatus;
use App\Models\{CostCenter, Expense, PaymentMethod, User};
use Filament\Notifications\Notification;
use Filament\Tables\Actions\{BulkActionGroup, DeleteAction, DeleteBulkAction, EditAction};
use Filament\Tables\Columns\Summarizers\{Sum, Summarizer};
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ExpenseTable
{
    public static function make(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make(Expense::NAME)
                    ->label(trans('expense.fields.name'))
                    ->searchable(),
                TextColumn::make(Expense::AMOUNT)
                    ->label(trans('expense.fields.amount'))
                    ->numeric()
                    ->sortable()
                    ->summarize([
                        Sum::make()
                            ->label(trans('expense.summarize.total_pending'))
                            ->query(function ($query) {
                                return $query->where(Expense::STATUS, '=', ExpenseStatus::PENDING->value);
                            }),
                    ]),
                TextColumn::make(Expense::DATE)
                    ->label(trans('expense.fields.date'))
                    ->date()
                    ->sortable()
                    ->summarize(
                        Summarizer::make()
                            ->label(trans('expense.summarize.total_paid'))
                            ->using(function ($query) {
                                return $query->where(Expense::STATUS, '=', ExpenseStatus::PAID->value)->sum(Expense::AMOUNT);
                            })
                            ->formatStateUsing(fn (float $state) => number_format($state, 0, ',', '.'))
                    ),
                TextColumn::make(Expense::STATUS)
                    ->label(trans('expense.fields.status'))
                    ->badge()
                    ->color(fn ($state): string => ExpenseStatus::color($state))
                    ->formatStateUsing(fn ($state): string => ExpenseStatus::translation($state)),
                TextColumn::make(Expense::CREATED_AT)
                    ->label(trans('general.timestamps.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make(Expense::UPDATED_AT)
                    ->label(trans('general.timestamps.updated_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('costCenter.name')
                    ->label(trans('expense.fields.cost_center'))
                    ->numeric()
                    ->sortable(),
                TextColumn::make('paymentMethod.name')
                    ->label(trans('expense.fields.payment_method'))
                    ->numeric()
                    ->sortable(),
                TextColumn::make('user.name')
                    ->label(trans('expense.fields.user'))
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make(Expense::STATUS)
                    ->label(trans('expense.fields.status'))
                    ->placeholder(trans('expense.filters.status'))
                    ->options(ExpenseStatus::toArray()),
                SelectFilter::make(Expense::COST_CENTER_ID)
                    ->label(trans('expense.fields.cost_center'))
                    ->placeholder(trans('expense.filters.cost_center'))
                    ->options(CostCenter::query()->get()->pluck('name', 'id')->toArray()),
                SelectFilter::make(Expense::PAYMENT_METHOD_ID)
                    ->label(trans('expense.fields.payment_method'))
                    ->placeholder(trans('expense.filters.payment_method'))
                    ->options(PaymentMethod::query()->get()->pluck('name', 'id')->toArray()),
                SelectFilter::make(Expense::USER_ID)
                    ->label(trans('expense.fields.user'))
                    ->placeholder(trans('expense.filters.user'))
                    ->options(User::query()->get()->pluck('name', 'id')->toArray()),
                MonthFilter::make('month'),
                PeriodFilter::make('period'),
                DateRangeFilter::make('date_range'),
            ])
            ->actions([
                EditAction::make()
                    ->label('')
                    ->size('xl')
                    ->color('primary'),
                DeleteAction::make()
                    ->label('')
                    ->size('xl')
                    ->color('danger')
                    ->modalHeading(trans('general.actions.delete-item', ['item' => trans('expense.entity')]))
                    ->successNotification(
                        Notification::make()
                            ->title(trans('expense.messages.deleted.title'))
                            ->body(trans('expense.messages.deleted.body'))
                            ->success()
                    ),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
