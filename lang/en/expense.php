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
        'from' => 'From',
        'until' => 'Until',
        'period' => 'Period',
        'start_date' => 'Start Date',
        'end_date' => 'End Date',
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
        'toggle' => [
            'title' => 'Status changed',
            'body' => 'The status of the expense has been successfully changed.',
        ],
        'export' => [
            'title' => 'Export Expenses',
            'success_body' => 'Expenses have been successfully exported.',
            'error_body' => 'No expenses found with these criteria.',
        ],
    ],
    'filters' => [
        'status' => 'Filter by status',
        'cost_center' => 'Filter by cost center',
        'payment_method' => 'Filter by payment method',
        'user' => 'Filter by user',
        'month' => 'Filter by month',
        'period' => 'Filter by period',
    ],
    'summarize' => [
        'total_pending' => 'Total pending',
        'total_paid' => 'Total paid',
    ],
];
