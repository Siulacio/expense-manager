<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!--[if mso]>
    <noscript>
        <xml>
            <o:OfficeDocumentSettings>
                <o:PixelsPerInch>96</o:PixelsPerInch>
            </o:OfficeDocumentSettings>
        </xml>
    </noscript>
    <![endif]-->
    <style>
        /* Reset básico para emails */
        body, table, td, p, a, li, blockquote {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table, td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        img {
            -ms-interpolation-mode: bicubic;
            border: 0;
            display: block;
            outline: none;
            text-decoration: none;
        }

        /* Estilos principales */
        .email-wrapper {
            background-color: #f3f4f6;
            padding: 32px 16px;
            font-family: Arial, sans-serif;
        }

        .email-container {
            max-width: 650px;
            margin: 0 auto;
            background-color: #f3f4f6;
        }

        .card {
            background-color: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
            padding: 24px;
            color: #ffffff;
        }

        .stats-grid {
            display: table;
            width: 100%;
            table-layout: fixed;
        }

        .stat-item {
            display: table-cell;
            text-align: center;
            vertical-align: top;
            padding: 0 8px;
        }

        .table-container {
            padding: 24px;
        }

        .expense-table {
            width: 100%;
            border-collapse: collapse;
            margin: 16px 0;
        }

        .expense-table th {
            background-color: #f9fafb;
            padding: 12px 16px;
            text-align: left;
            font-weight: bold;
            color: #374151;
            border-bottom: 2px solid #e5e7eb;
            font-size: 14px;
        }

        .expense-table td {
            padding: 12px 16px;
            border-bottom: 1px solid #f3f4f6;
            color: #1f2937;
        }

        .expense-table tbody tr:hover {
            background-color: #f9fafb;
        }

        .expense-icon {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: inline-block;
            text-align: center;
            line-height: 32px;
            margin-right: 12px;
            vertical-align: middle;
            font-size: 14px;
        }

        .amount {
            font-weight: bold;
            color: #dc2626;
            text-align: right;
        }

        .total-row {
            background-color: #f9fafb;
            border-top: 2px solid #e5e7eb;
        }

        .total-row td {
            font-weight: bold;
            font-size: 16px;
            padding: 16px;
        }

        .btn {
            display: inline-block;
            padding: 12px 32px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            text-align: center;
            margin: 8px;
        }

        .btn-primary {
            background-color: #2563eb;
            color: #ffffff;
        }

        .btn-secondary {
            background-color: #e5e7eb;
            color: #374151;
        }

        .summary-grid {
            display: table;
            width: 100%;
            margin-top: 24px;
            table-layout: fixed;
        }

        .summary-item {
            display: table-cell;
            padding: 16px;
            border-radius: 8px;
            margin: 0 8px;
            text-align: center;
        }

        .summary-blue {
            background-color: #eff6ff;
            color: #1e40af;
        }

        .summary-green {
            background-color: #f0fdf4;
            color: #166534;
        }

        /* Responsive para móviles */
        @media only screen and (max-width: 600px) {
            .stats-grid, .stat-item {
                display: block !important;
                width: 100% !important;
                text-align: center !important;
                margin-bottom: 16px;
            }

            .summary-grid, .summary-item {
                display: block !important;
                width: 100% !important;
                margin-bottom: 16px;
            }

            .expense-table th, .expense-table td {
                padding: 8px 4px;
                font-size: 12px;
            }

            .btn {
                display: block !important;
                width: 90% !important;
                margin: 8px auto !important;
            }
        }
    </style>
</head>
<body style="margin: 0; padding: 0; background-color: #f3f4f6;">

<div class="email-wrapper">
    <div class="email-container">

        @yield('header')

        @yield('body')

        @yield('footer')

    </div>
</div>
</body>
</html>
