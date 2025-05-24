<?php

namespace App\Filament\Resources;

use App\Const\HeroIcons;
use App\Filament\Resources\CostCenterResource\Pages;
use App\Models\CostCenter;
use Filament\Forms\Components\{Select, TextInput};
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CostCenterResource extends Resource
{
    protected static ?string $model = CostCenter::class;

    protected static ?string $navigationIcon = HeroIcons::RECTANGLE_STACK;

    public static function form(Form $form): Form
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
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make(CostCenter::NAME)
                    ->label(trans('cost_center.fields.name'))
                    ->searchable(),
                Tables\Columns\TextColumn::make(CostCenter::CREATED_AT)
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make(CostCenter::UPDATED_AT)
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('user.name')
                    ->label(trans('cost_center.fields.user'))
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
