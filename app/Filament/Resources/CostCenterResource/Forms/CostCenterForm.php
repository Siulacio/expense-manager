<?php

declare(strict_types=1);

namespace App\Filament\Resources\CostCenterResource\Forms;

use App\Models\CostCenter;
use Filament\Forms\Components\{Select, TextInput};
use Filament\Forms\Form;

class CostCenterForm
{
    public static function make(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make(CostCenter::NAME)
                    ->label(trans('cost_center.fields.name'))
                    ->required()
                    ->maxLength(100),
                Select::make(CostCenter::USER_ID)
                    ->label(trans('cost_center.fields.user'))
                    ->relationship('user', 'name')
                    ->required()
                    ->disabled()
                    ->dehydrated()
                    ->default(auth()->user()->getAuthIdentifier()),
            ]);
    }
}
