<?php

declare(strict_types=1);

namespace App\Filament\Resources\CostCenterResource\Tables;

use App\Models\CostCenter;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\{BulkActionGroup, DeleteAction, DeleteBulkAction, EditAction};
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CostCenterTable
{
    public static function make(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make(CostCenter::NAME)
                    ->label(trans('cost_center.fields.name'))
                    ->searchable(),
                TextColumn::make(CostCenter::CREATED_AT)
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make(CostCenter::UPDATED_AT)
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('user.name')
                    ->label(trans('cost_center.fields.user'))
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
                    ->modalHeading(trans('general.actions.delete-item', ['item' => trans('cost_center.entity')]))
                    ->successNotification(
                        Notification::make()
                            ->title(trans('cost_center.messages.deleted.title'))
                            ->body(trans('cost_center.messages.deleted.body'))
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
