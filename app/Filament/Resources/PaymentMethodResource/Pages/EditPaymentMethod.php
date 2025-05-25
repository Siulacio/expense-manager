<?php

namespace App\Filament\Resources\PaymentMethodResource\Pages;

use App\Filament\Resources\PaymentMethodResource;
use App\Traits\HasEditCommonMethods;
use Filament\Resources\Pages\EditRecord;

class EditPaymentMethod extends EditRecord
{
    use HasEditCommonMethods;

    protected static string $resource = PaymentMethodResource::class;
}
