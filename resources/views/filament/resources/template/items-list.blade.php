<x-filament-tables::container>
    <x-filament-tables::table>
        <x-slot name="header">
            <x-filament-tables::header-cell alignment="center">
                {{ trans('expense.fields.name') }}
            </x-filament-tables::header-cell>
            <x-filament-tables::header-cell alignment="right">
                {{ trans('expense.fields.amount') }}
            </x-filament-tables::header-cell>
            <x-filament-tables::header-cell alignment="center">
                {{ trans('expense.fields.cost_center') }}
            </x-filament-tables::header-cell>
            <x-filament-tables::header-cell alignment="center">
                {{ trans('expense.fields.payment_method') }}
            </x-filament-tables::header-cell>
        </x-slot>

        @foreach($items as $item)
            <x-filament-tables::row>
                <x-filament-tables::cell class="text-center">
                    {{ $item->name }}
                </x-filament-tables::cell>
                <x-filament-tables::cell class="text-right">
                    {{ number_format($item->amount, 0, ',', '.') }}
                </x-filament-tables::cell>
                <x-filament-tables::cell class="text-center">
                    {{ $item->costCenter->name }}
                </x-filament-tables::cell>
                <x-filament-tables::cell class="text-center">
                    {{ $item->paymentMethod->name }}
                </x-filament-tables::cell>
            </x-filament-tables::row>
        @endforeach
    </x-filament-tables::table>
</x-filament-tables::container>
