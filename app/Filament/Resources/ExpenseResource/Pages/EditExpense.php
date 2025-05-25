<?php

namespace App\Filament\Resources\ExpenseResource\Pages;

use App\Filament\Resources\ExpenseResource;
use App\Traits\HasEditCommonMethods;
use Filament\Resources\Pages\EditRecord;

class EditExpense extends EditRecord
{
    use HasEditCommonMethods;

    protected static string $resource = ExpenseResource::class;
}
