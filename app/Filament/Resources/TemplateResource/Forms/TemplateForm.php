<?php

declare(strict_types=1);

namespace App\Filament\Resources\TemplateResource\Forms;

use App\Models\Template;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;

class TemplateForm
{
    public static function make(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label(trans('template.fields.name'))
                    ->required()
                    ->maxLength(100)
                    ->unique(Template::TABLE, Template::NAME, ignoreRecord: true),
            ]);
    }
}
