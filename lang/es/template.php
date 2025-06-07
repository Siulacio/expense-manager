<?php

return [
    'entity' => 'Plantilla',
    'fields' => [
        'name' => 'Nombre',
        'user' => 'Usuario',
    ],
    'modal' => [
        'copy' => [
            'title' => 'Copiar plantilla',
            'description' => '¿Estás seguro de que deseas copiar esta plantilla?',
        ],
        'details' => [
            'title' => 'Detalles asociados a la plantilla',
        ],
    ],
    'messages' => [
        'created' => [
            'title' => 'Plantilla creada',
            'body' => 'La plantilla ha sido creada exitosamente.',
        ],
        'updated' => [
            'title' => 'Plantilla actualizada',
            'body' => 'La plantilla ha sido actualizada exitosamente.',
        ],
        'deleted' => [
            'title' => 'Plantilla eliminada',
            'body' => 'La plantilla ha sido eliminada exitosamente.',
        ],
        'copied' => [
            'title' => 'Plantilla copiada',
            'body' => 'La plantilla ha sido copiada exitosamente.',
        ],
    ],
];
