<?php

return [
    'entity' => 'Gasto',
    'fields' => [
        'name' => 'Nombre',
        'amount' => 'Monto',
        'date' => 'Fecha',
        'status' => 'Estado',
        'cost_center' => 'Centro de costo',
        'payment_method' => 'Método de pago',
        'user' => 'Usuario',
        'month' => 'Mes',
        'from' => 'Desde',
        'until' => 'Hasta',
        'period' => 'Período',
        'start_date' => 'Fecha de inicio',
        'end_date' => 'Fecha final',
    ],
    'report' => 'Informe de gastos :date',
    'messages' => [
        'created' => [
            'title' => 'Gasto creado',
            'body' => 'El gasto ha sido creado exitosamente.',
        ],
        'updated' => [
            'title' => 'Gasto actualizado',
            'body' => 'El gasto ha sido actualizado exitosamente.',
        ],
        'deleted' => [
            'title' => 'Gasto eliminado',
            'body' => 'El gasto ha sido eliminado exitosamente.',
        ],
        'toggle' => [
            'title' => 'Estado cambiado',
            'body' => 'El estado del gasto ha sido cambiado exitosamente.',
        ],
        'export' => [
            'title' => 'Exportar gastos',
            'success_body' => 'Los gastos han sido exportados exitosamente.',
            'error_body' => 'No se han encontrado gastos con estos criterios.',
        ],
    ],
    'filters' => [
        'status' => 'Filtrar por estado',
        'cost_center' => 'Filtrar por centro de costo',
        'payment_method' => 'Filtrar por método de pago',
        'user' => 'Filtrar por usuario',
        'month' => 'Filtrar por mes',
        'period' => 'Filtrar por período',
    ],
    'summarize' => [
        'total_pending' => 'Total por pagar',
        'total_paid' => 'Total pagado',
    ],
    'mail' => [
        'title' => 'Resumen de gastos mensual',
        'description' => 'Tu resumen mensual de gastos',
        'expense_summary' => 'Resumen de gastos',
        'total_spent' => 'Total gastado',
        'expenses_count' => 'Número de gastos',
        'average_per_expense' => 'Promedio por gasto',
        'expense_details' => 'Detalle de gastos',
        'expense_details_description' => 'Aquí tienes el desglose completo de tus gastos del mes.',
        'expense_name' => 'Nombre del gasto',
        'amount' => 'Monto',
        'date' => 'Fecha',
        'total_of_the_period' => 'Total del período',
        'copyright' => '© :year :app_name. Control inteligente de tus finanzas.',
        'footer_message' => 'Este resumen se genera automáticamente basado en tus transacciones registradas.',
        'messages' => [
            'success' => 'El resumen de gastos ha sido enviado exitosamente.',
            'error' => 'No se encontraron gastos con los parametros seleccionados.',
        ],
    ],
];
