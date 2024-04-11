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
    'site' => [
        'sorts' => [
            'clave_sitio',
            'clave_sitio_alterna',
            'nombre_sitio',
            'alias_sitio',
            'calle_sitio',
            'numero_sitio',
            'colonia_sitio',
            'municipio_sitio',
            'estado_sitio',
            'cp_sitio',
            'latitud_sitio',
            'longitud_sitio',
            'proyecto_sitio',
            'created_at',
            'updated_at',
        ],
        'fields' => [
            'clave_sitio',
            'clave_sitio_alterna',
            'nombre_sitio',
            'alias_sitio',
            'calle_sitio',
            'numero_sitio',
            'colonia_sitio',
            'municipio_sitio',
            'estado_sitio',
            'cp_sitio',
            'latitud_sitio',
            'longitud_sitio',
            'proyecto_sitio',
            'created_at',
            'updated_at',
        ],
        'includes' => []
    ],
];
