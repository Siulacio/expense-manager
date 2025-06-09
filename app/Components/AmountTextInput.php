<?php

declare(strict_types=1);

namespace App\Components;

use Filament\Forms\Components\TextInput;
use Filament\Support\RawJs;

class AmountTextInput extends TextInput
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->label(trans('expense.fields.amount'));
        $this->required();
        $this->numeric();
        $this->mask(RawJs::make(<<<'JS'
            $money($input, ',', '.', 0)
        JS));
        $this->dehydrateStateUsing(fn ($state) => (int) str_replace('.', '', $state));
    }
}
