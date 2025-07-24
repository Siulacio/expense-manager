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
    'report' => 'Expense report :date',
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
    'mail' => [
        'title' => 'Monthly expense summary',
        'description' => 'Your monthly expense summary',
        'expense_summary' => 'Expense Summary',
        'total_spent' => 'Total spent',
        'expenses_count' => 'Number of expenses',
        'average_per_expense' => 'Average per expense',
        'expense_details' => 'Expense details',
        'expense_details_description' => 'Here is the complete breakdown of your expenses for the month.',
        'expense_name' => 'Expense name',
        'amount' => 'Amount',
        'date' => 'Date',
        'total_of_the_period' => 'Total for the period',
        'copyright' => '© :year :app_name. Smart control of your finances.',
        'footer_message' => 'This summary is automatically generated based on your recorded transactions.',
    ],
];
