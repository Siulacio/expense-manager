<?php

declare(strict_types=1);

namespace App\Filament\Resources\TemplateResource\Forms;

use Filament\Forms\Components\{DatePicker, Section};

class CopyForm
{
    public static function make(): array
    {
        return [
            Section::make()
            ->schema([
                DatePicker::make('date')
                    ->label(trans('expense.fields.date'))
                    ->required()
                    ->extraAttributes(['class' => 'w-32'])
                    ->default(now()->format('Y-m-d')),
            ]),
        ];
    }
}
