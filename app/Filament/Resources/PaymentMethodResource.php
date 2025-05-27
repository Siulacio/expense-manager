<?php

namespace App\Filament\Resources;

use App\Const\HeroIcons;
use App\Enums\Status;
use App\Filament\Resources\PaymentMethodResource\Pages;
use App\Models\PaymentMethod;
use Filament\Forms\Form;
use Filament\{Forms, Notifications\Notification, Tables};
use Filament\Resources\Resource;
use Filament\Tables\Table;

class PaymentMethodResource extends Resource
{
    protected static ?string $model = PaymentMethod::class;

    protected static ?string $navigationIcon = HeroIcons::CREDIT_CARD;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make(PaymentMethod::NAME)
                    ->label(trans('payment_method.fields.name'))
                    ->required()
                    ->maxLength(50),
                Forms\Components\Select::make(PaymentMethod::STATUS)
                    ->label(trans('payment_method.fields.status'))
                    ->options(Status::toArray())
                    ->default(Status::ACTIVE->value)
                    ->required(),
                Forms\Components\Select::make(PaymentMethod::USER_ID)
                    ->label(trans('payment_method.fields.user'))
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
                Tables\Columns\TextColumn::make('name')
                    ->label(trans('payment_method.fields.name'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->label(trans('payment_method.fields.status'))
                    ->badge()
                    ->color(fn ($state): string => Status::color($state))
                    ->formatStateUsing(fn ($state): string => Status::translation($state)),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(trans('general.timestamps.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label(trans('general.timestamps.updated_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('user.name')
                    ->label(trans('payment_method.fields.user'))
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('')
                    ->size('xl')
                    ->color('primary'),
                Tables\Actions\DeleteAction::make()
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
            'index' => Pages\ListPaymentMethods::route('/'),
            'create' => Pages\CreatePaymentMethod::route('/create'),
            'edit' => Pages\EditPaymentMethod::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return trans('payment_method.entity');
    }
}
