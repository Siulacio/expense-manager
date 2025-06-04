<?php

declare(strict_types=1);

namespace App\Filament\Resources\TemplateResource\Tables;

use App\Const\HeroIcons;
use App\Filament\Resources\TemplateResource\Actions\CopyTemplateAction;
use App\Filament\Resources\TemplateResource\Forms\CopyForm;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\{Action, BulkActionGroup, DeleteAction, DeleteBulkAction, EditAction};
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;

class TemplateTable
{
    public static function make(Table $table): Table
    {
        return $table
            ->groups([
                Group::make('name')->collapsible(),
            ])
            ->columns([
                TextColumn::make('name')
                    ->label(trans('template.fields.name'))
                    ->searchable(),
                TextColumn::make('item_name')
                    ->label(trans('template.fields.name'))
                    ->searchable(),
                TextColumn::make('item_amount')
                    ->label(trans('expense.fields.amount'))
                    ->searchable(),
                TextColumn::make('item_cost_center_name')
                    ->label(trans('expense.fields.cost_center'))
                    ->searchable(),
                TextColumn::make('item_payment_method_name')
                    ->label(trans('expense.fields.payment_method'))
                    ->searchable(),
            ])
            ->filters([
            ])
            ->actions([
                EditAction::make()
                    ->label('')
                    ->size('xl')
                    ->color('primary'),
                Action::make('copy')
                    ->label('')
                    ->size('xl')
                    ->icon(HeroIcons::DOCUMENT_DUPLICATE)
                    ->modalHeading(trans('template.modal.title'))
                    ->modalDescription(trans('template.modal.description'))
                    ->form(CopyForm::make())
                    ->modalSubmitActionLabel(trans('general.actions.copy'))
                    ->action(function (array $data, $record) {
                        CopyTemplateAction::execute($data, $record);
                    }),
                DeleteAction::make()
                    ->label('')
                    ->size('xl')
                    ->color('danger')
                    ->modalHeading(trans('general.actions.delete-item', ['item' => trans('template.entity')]))
                    ->successNotification(
                        Notification::make()
                            ->title(trans('template.messages.deleted.title'))
                            ->body(trans('template.messages.deleted.body'))
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
