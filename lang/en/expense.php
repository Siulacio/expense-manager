<?php

return [
    'entity' => 'Expense',
    'fields' => [
        'name' => 'Name',
        'amount' => 'Amount',
        'date' => 'Date',
        'status' => 'Status',
        'cost_center' => 'Cost Center',
        'payment_method' => 'Payment Method',
        'user' => 'User',
        'month' => 'Month',
    ],
    'messages' => [
        'created' => [
            'title' => 'Expense created',
            'body' => 'The expense has been successfully created.',
        ],
        'updated' => [
            'title' => 'Expense updated',
            'body' => 'The expense has been successfully updated.',
        ],
        'deleted' => [
            'title' => 'Expense deleted',
            'body' => 'The expense has been successfully deleted.',
        ],
    ],
    'filters' => [
        'status' => 'Filter by status',
        'cost_center' => 'Filter by cost center',
        'payment_method' => 'Filter by payment method',
        'user' => 'Filter by user',
        'month' => 'Filter by month',
    ],
];
