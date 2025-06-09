<?php

declare(strict_types=1);

namespace App\Filament\Resources\TemplateResource\Forms;

use App\Components\AmountTextInput;
use App\Models\{CostCenter, PaymentMethod, Template, TemplateItem};
use Filament\Forms\Components\{Repeater, Section, Select, TextInput};
use Filament\Forms\Form;

class TemplateForm
{
    public static function make(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    TextInput::make('name')
                        ->label(trans('template.fields.name'))
                        ->required()
                        ->maxLength(100)
                        ->unique(Template::TABLE, Template::NAME, ignoreRecord: true),
                    Select::make(Template::USER_ID)
                        ->label(trans('template.fields.user'))
                        ->relationship('user', 'name')
                        ->required()
                        ->disabled()
                        ->dehydrated()
                        ->default(auth()->user()->getAuthIdentifier()),
                ])->columns(),
                Section::make()->schema([
                    Repeater::make('items')
                        ->schema([
                            TextInput::make(Template::NAME)
                                 ->label(trans('expense.fields.name'))
                                ->required(),
                            AmountTextInput::make(TemplateItem::AMOUNT),
                            Select::make(TemplateItem::COST_CENTER_ID)
                                ->label(trans('expense.fields.cost_center'))
                                ->required()
                                ->options(CostCenter::query()->get()->pluck('name', 'id')),
                            Select::make(TemplateItem::PAYMENT_METHOD_ID)
                                ->label(trans('expense.fields.payment_method'))
                                ->required()
                                ->options(PaymentMethod::query()->get()->pluck('name', 'id')),
                        ])
                        ->required()
                        ->columns(4),
                ]),
            ]);
    }
}
