<?php

return [
    'actions' => [
        'save' => 'Save',
        'save-create' => 'Save and create',
        'delete' => 'Delete',
        'delete-item' => 'Delete :item',
        'cancel' => 'Cancel',
        'copy' => 'Copy',
        'close' => 'Close',
        'export' => 'Export',
    ],
    'timestamps' => [
        'created_at' => 'Created at',
        'updated_at' => 'Updated at',
    ],
    'status' => [
        'active' => 'Active',
        'inactive' => 'Inactive',
        'pending' => 'Pending',
        'paid' => 'Paid',
    ],
    'months' => [
        App\Enums\Months::JANUARY->value => 'January',
        App\Enums\Months::FEBRUARY->value => 'February',
        App\Enums\Months::MARCH->value => 'March',
        App\Enums\Months::APRIL->value => 'April',
        App\Enums\Months::MAY->value => 'May',
        App\Enums\Months::JUNE->value => 'June',
        App\Enums\Months::JULY->value => 'July',
        App\Enums\Months::AUGUST->value => 'August',
        App\Enums\Months::SEPTEMBER->value => 'September',
        App\Enums\Months::OCTOBER->value => 'October',
        App\Enums\Months::NOVEMBER->value => 'November',
        App\Enums\Months::DECEMBER->value => 'December',
    ],
    'periods' => [
        'current_month' => 'Current month',
        'last_month' => 'Last month',
        'last_3_months' => 'Last 3 months',
        'last_6_months' => 'Last 6 months',
        'current_year' => 'Current year',
    ],
];
