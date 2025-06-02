<?php

declare(strict_types=1);

namespace App\Filament\Resources\PaymentMethodResource\Forms;

use App\Enums\Status;
use App\Models\PaymentMethod;
use Filament\Forms\Components\{Select, TextInput};
use Filament\Forms\Form;

class PaymentMethodForm
{
    public static function make(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make(PaymentMethod::NAME)
                    ->label(trans('payment_method.fields.name'))
                    ->required()
                    ->maxLength(50),
                Select::make(PaymentMethod::STATUS)
                    ->label(trans('payment_method.fields.status'))
                    ->options(Status::toArray())
                    ->default(Status::ACTIVE->value)
                    ->required(),
                Select::make(PaymentMethod::USER_ID)
                    ->label(trans('payment_method.fields.user'))
                    ->relationship('user', 'name')
                    ->required()
                    ->disabled()
                    ->dehydrated()
                    ->default(auth()->user()->getAuthIdentifier()),
            ]);
    }
}
