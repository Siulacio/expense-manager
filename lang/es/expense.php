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
    ],
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
    ],
    'filters' => [
        'status' => 'Filtrar por estado',
        'cost_center' => 'Filtrar por centro de costo',
        'payment_method' => 'Filtrar por método de pago',
        'user' => 'Filtrar por usuario',
        'month' => 'Filtrar por mes',
        'period' => 'Filtrar por período',
    ],
];
