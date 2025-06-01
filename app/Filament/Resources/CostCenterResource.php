<?php

namespace App\Filament\Resources;

use App\Const\HeroIcons;
use App\Filament\Resources\CostCenterResource\Forms\CostCenterForm;
use App\Filament\Resources\CostCenterResource\Pages;
use App\Filament\Resources\CostCenterResource\Tables\CostCenterTable;
use App\Models\CostCenter;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;

class CostCenterResource extends Resource
{
    protected static ?string $model = CostCenter::class;

    protected static ?string $navigationIcon = HeroIcons::RECTANGLE_GROUP;

    public static function form(Form $form): Form
    {
        return CostCenterForm::make($form);
    }

    public static function table(Table $table): Table
    {
        return CostCenterTable::make($table);
    }

    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCostCenters::route('/'),
            'create' => Pages\CreateCostCenter::route('/create'),
            'edit' => Pages\EditCostCenter::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return trans('cost_center.entity');
    }
}
