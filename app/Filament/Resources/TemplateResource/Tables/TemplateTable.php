<?php

declare(strict_types=1);

namespace App\Filament\Resources\TemplateResource\Tables;

use App\Const\HeroIcons;
use App\Filament\Resources\TemplateResource\Actions\CopyTemplateAction;
use Filament\Forms\Components\{DatePicker, Section};
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
                EditAction::make()
                    ->label('')
                    ->size('xl')
                    ->color('primary'),
                Action::make('copy')
                    ->label('')
                    ->size('xl')
                    ->icon(HeroIcons::DOCUMENT_DUPLICATE)
                    ->modalHeading('Copiar plantilla')
                    ->modalDescription('¿Estás seguro de que deseas copiar esta plantilla?')
                    ->form([
                        Section::make()->schema([
                            DatePicker::make('date')
                                ->label(trans('expense.fields.date'))
                                ->required()
                                ->default(now()->format('Y-m-d')),
                        ])->columns(),
                    ])
                    ->modalSubmitActionLabel('Copiar')
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
