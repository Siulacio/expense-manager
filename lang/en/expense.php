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
];
