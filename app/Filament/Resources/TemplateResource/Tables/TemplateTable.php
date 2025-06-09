<?php

declare(strict_types=1);

namespace App\Filament\Resources\TemplateResource\Tables;

use App\Const\HeroIcons;
use App\Filament\Resources\TemplateResource\Actions\CopyTemplateAction;
use App\Filament\Resources\TemplateResource\Forms\CopyForm;
use App\Models\Template;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\{Action, BulkActionGroup, DeleteAction, DeleteBulkAction, EditAction};
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TemplateTable
{
    public static function make(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(trans('template.fields.name'))
                    ->searchable(),
            ])
            ->filters([
            ])
            ->actions([
                Action::make('view')
                    ->label('')
                    ->size('xl')
                    ->icon(HeroIcons::EYE)
                    ->modalHeading(trans('template.modal.details.title'))
                    ->modalSubmitAction(false)
                    ->modalCancelActionLabel(trans('general.actions.close'))
                    ->modalContent(function (Template $record) {
                        return view('filament.resources.template.items-list', [
                            'items' => $record->items,
                        ]);
                    }),
                EditAction::make()
                    ->label('')
                    ->size('xl')
                    ->color('primary'),
                Action::make('copy')
                    ->label('')
                    ->size('xl')
                    ->icon(HeroIcons::DOCUMENT_DUPLICATE)
                    ->modalHeading(trans('template.modal.copy.title'))
                    ->modalDescription(trans('template.modal.copy.description'))
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
