<?php

namespace App\Filament\Resources\PaymentMethodResource\Pages;

use App\Filament\Resources\PaymentMethodResource;
use App\Traits\HasCreateCommonMethods;
use Filament\Resources\Pages\CreateRecord;

class CreatePaymentMethod extends CreateRecord
{
    use HasCreateCommonMethods;

    protected static string $resource = PaymentMethodResource::class;
}
