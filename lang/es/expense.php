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
];
