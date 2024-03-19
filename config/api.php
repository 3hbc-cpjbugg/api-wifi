<?php

declare(strict_types=1);

return [

    'users' => [
        'sorts' => [
            'id',
            'name',
            'email',
            'created_at',
            'updated_at',
        ],
        'fields' => [
            'id',
            'name',
            'email',
            'created_at',
            'updated_at',
        ],
        'includes' => [
            'roles',
            'parent',
            'children',
            'salesRepresentative',
            'credits'
        ]
    ],
    'service' => [
        'sorts' => [
            'id',
            'name',
            'description'

        ],
        'fields' => [
            'id',
            'name',
            'description',

        ],
        'includes' => [

        ]
    ]

];
