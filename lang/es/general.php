<?php

return [
    'actions' => [
        'save' => 'Guardar',
        'save-create' => 'Guardar y crear',
        'delete' => 'Eliminar',
        'delete-item' => 'Eliminar :item',
        'cancel' => 'Cancelar',
        'copy' => 'Copiar',
        'close' => 'Cerrar',
    ],
    'timestamps' => [
        'created_at' => 'Creado en',
        'updated_at' => 'Actualizado en',
    ],
    'status' => [
        'active' => 'Activo',
        'inactive' => 'Inactivo',
        'pending' => 'Pendiente',
        'paid' => 'Pagado',
    ],
    'months' => [
        App\Enums\Months::JANUARY->value => 'Enero',
        App\Enums\Months::FEBRUARY->value => 'Febrero',
        App\Enums\Months::MARCH->value => 'Marzo',
        App\Enums\Months::APRIL->value => 'Abril',
        App\Enums\Months::MAY->value => 'Mayo',
        App\Enums\Months::JUNE->value => 'Junio',
        App\Enums\Months::JULY->value => 'Julio',
        App\Enums\Months::AUGUST->value => 'Agosto',
        App\Enums\Months::SEPTEMBER->value => 'Septiembre',
        App\Enums\Months::OCTOBER->value => 'Octubre',
        App\Enums\Months::NOVEMBER->value => 'Noviembre',
        App\Enums\Months::DECEMBER->value => 'Diciembre',
    ],
    'periods' => [
        'current_month' => 'Este mes',
        'last_month' => 'Mes pasado',
        'last_3_months' => 'Últimos 3 meses',
        'last_6_months' => 'Últimos 6 meses',
        'current_year' => 'Este año',
    ],
];
