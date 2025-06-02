<?php

namespace App\Filament\Resources;

use App\Const\HeroIcons;
use App\Filament\Resources\PaymentMethodResource\Forms\PaymentMethodForm;
use App\Filament\Resources\PaymentMethodResource\Pages;
use App\Filament\Resources\PaymentMethodResource\Tables\PaymentMethodTable;
use App\Models\PaymentMethod;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;

class PaymentMethodResource extends Resource
{
    protected static ?string $model = PaymentMethod::class;

    protected static ?string $navigationIcon = HeroIcons::CREDIT_CARD;

    public static function form(Form $form): Form
    {
        return PaymentMethodForm::make($form);
    }

    public static function table(Table $table): Table
    {
        return PaymentMethodTable::make($table);
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
