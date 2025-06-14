<?php

return [
    'entity' => 'Template',
    'fields' => [
        'name' => 'Name',
        'user' => 'User',
    ],
    'modal' => [
        'copy' => [
            'title' => 'Copy Template',
            'description' => 'Are you sure you want to copy this template?',
        ],
        'details' => [
            'title' => 'Associated template items',
        ],
    ],
    'messages' => [
        'created' => [
            'title' => 'Template created',
            'body' => 'The template has been successfully created.',
        ],
        'updated' => [
            'title' => 'Template updated',
            'body' => 'The template has been successfully updated.',
        ],
        'deleted' => [
            'title' => 'Template deleted',
            'body' => 'The template has been successfully deleted.',
        ],
        'copied' => [
            'title' => 'Template copied',
            'body' => 'The template has been successfully copied.',
        ],
    ],
];
