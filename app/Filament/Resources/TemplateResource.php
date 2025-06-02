<?php

namespace App\Filament\Resources;

use App\Const\HeroIcons;
use App\Filament\Resources\TemplateResource\{Forms\TemplateForm, Pages, Tables\TemplateTable};
use App\Models\Template;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;

class TemplateResource extends Resource
{
    protected static ?string $model = Template::class;

    protected static ?string $navigationIcon = HeroIcons::PUZZLE_PIECE;

    public static function form(Form $form): Form
    {
        return TemplateForm::make($form);
    }

    public static function table(Table $table): Table
    {
        return TemplateTable::make($table);
    }

    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTemplates::route('/'),
            'create' => Pages\CreateTemplate::route('/create'),
            'edit' => Pages\EditTemplate::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return trans('template.entity');
    }
}
