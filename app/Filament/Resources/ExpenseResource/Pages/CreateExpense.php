<?php

namespace App\Filament\Resources\ExpenseResource\Pages;

use App\Filament\Resources\ExpenseResource;
use App\Traits\HasCreateCommonMethods;
use Filament\Resources\Pages\CreateRecord;

class CreateExpense extends CreateRecord
{
    use HasCreateCommonMethods;

    protected static string $resource = ExpenseResource::class;
}
