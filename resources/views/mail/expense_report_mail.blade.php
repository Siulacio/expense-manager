@extends('mail.base.email_base')

@section('title', trans('expense.mail.title'))

@section('header')
    <!-- Header del email -->
    <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom: 32px;">
        <tr>
            <td align="center">
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="background-color: #2563eb; width: 48px; height: 48px; border-radius: 8px; text-align: center; vertical-align: middle; margin-right: 12px;">
                            <span style="color: #ffffff; font-size: 20px;">💰</span>
                        </td>
                        <td style="padding-left: 12px;">
                            <h1 style="margin: 0; font-size: 24px; font-weight: bold; color: #1f2937;">{{config('app.name')}}</h1>
                        </td>
                    </tr>
                </table>
                <p style="margin: 8px 0 0 0; color: #6b7280;">{{trans('expense.mail.description')}}</p>
            </td>
        </tr>
    </table>
@endsection

@section('body')
    <!-- Card principal -->
    <div class="card">

        <!-- Header con estadísticas -->
        <div class="card-header">
            <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td>
                        <h2 style="margin: 0 0 16px 0; font-size: 20px; font-weight: bold;">{{ trans('expense.mail.expense_summary') }}</h2>
                    </td>
                    <td align="right">
                        <span style="color: #bfdbfe; font-size: 14px;">{{ $period }}</span>
                    </td>
                </tr>
            </table>

            <div class="stats-grid">
                <div class="stat-item">
                    <p style="margin: 0 0 4px 0; color: #bfdbfe; font-size: 14px;">{{ trans('expense.mail.total_spent') }}</p>
                    <p style="margin: 0; font-size: 24px; font-weight: bold;">${{ $total_expenses }}</p>
                </div>
                <div class="stat-item">
                    <p style="margin: 0 0 4px 0; color: #bfdbfe; font-size: 14px;">{{ trans('expense.mail.expenses_count') }}</p>
                    <p style="margin: 0; font-size: 24px; font-weight: bold;">{{ $expenses_count }}</p>
                </div>
                <div class="stat-item">
                    <p style="margin: 0 0 4px 0; color: #bfdbfe; font-size: 14px;">{{ trans('expense.mail.average_per_expense') }}</p>
                    <p style="margin: 0; font-size: 24px; font-weight: bold;">${{ $average_expense }}</p>
                </div>
            </div>
        </div>

        <!-- Contenido con tabla -->
        <div class="table-container">
            <h3 style="margin: 0 0 8px 0; font-size: 18px; font-weight: bold; color: #1f2937;">{{ trans('expense.mail.expense_details') }}</h3>
            <p style="margin: 0 0 24px 0; color: #6b7280; font-size: 14px;">{{ trans('expense.mail.expense_details_description') }}</p>

            <!-- Tabla de gastos -->
            <table class="expense-table">
                <thead>
                <tr>
                    <th>{{ trans('expense.mail.expense_name') }}</th>
                    <th>{{ trans('expense.mail.date') }}</th>
                    <th style="text-align: right;">{{ trans('expense.mail.amount') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($alt_expenses as $expense)
                    <tr>
                        <td><span style="font-weight: 500;">{{ $expense['name'] }}</span></td>
                        <td style="color: #6b7280; font-size: 14px;">{{ $expense['date'] }}</td>
                        <td class="amount">${{ $expense['amount'] }}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr class="total-row">
                    <td colspan="2" style="color: #1f2937;">{{ trans('expense.mail.total_of_the_period') }}</td>
                    <td style="text-align: right; color: #dc2626; font-size: 18px;">${{ $total_expenses }}</td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection

@section('footer')
    <!-- Footer -->
    <table width="100%" cellpadding="0" cellspacing="0" style="margin-top: 32px;">
        <tr>
            <td align="center">
                <p style="margin: 0 0 8px 0; color: #6b7280; font-size: 14px;">{{ trans('expense.mail.copyright', ['year' => now()->format('Y'), 'app_name' => config('app.name')]) }}</p>
                <p style="margin: 0; color: #9ca3af; font-size: 12px;">
                    {{ trans('expense.mail.footer_message') }}
                </p>
            </td>
        </tr>
    </table>
@endsection
