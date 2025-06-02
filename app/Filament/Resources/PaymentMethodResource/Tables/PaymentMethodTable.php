<?php

declare(strict_types=1);

namespace App\Filament\Resources\PaymentMethodResource\Tables;

use App\Enums\Status;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\{BulkActionGroup, DeleteAction, DeleteBulkAction, EditAction};
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PaymentMethodTable
{
    public static function make(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(trans('payment_method.fields.name'))
                    ->searchable(),
                TextColumn::make('status')
                    ->label(trans('payment_method.fields.status'))
                    ->badge()
                    ->color(fn ($state): string => Status::color($state))
                    ->formatStateUsing(fn ($state): string => Status::translation($state)),
                TextColumn::make('created_at')
                    ->label(trans('general.timestamps.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label(trans('general.timestamps.updated_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('user.name')
                    ->label(trans('payment_method.fields.user'))
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
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
                    ->modalHeading(trans('general.actions.delete-item', ['item' => trans('payment_method.entity')]))
                    ->successNotification(
                        Notification::make()
                            ->title(trans('payment_method.messages.deleted.title'))
                            ->body(trans('payment_method.messages.deleted.body'))
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
