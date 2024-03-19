<?php

declare(strict_types=1);

return [
    'municipalities' => [
        'sorts' => [
            'id',
            'name',
            'lat',
            'lng',
            'zoom',
            'created_at',
            'updated_at',
        ],
        'fields' => [
            'id',
            'name',
            'lat',
            'lng',
            'zoom',
            'created_at',
            'updated_at',
        ],
        'includes' => []
    ],
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
    'affiliates' => [
        'sorts' => [
            'photo',
            'first_name',
            'second_name',
            'first_last_name',
            'second_last_name',
            'elector_key',
            'phone',
            'origin',
            'state',
            'municipality',
        ],
        'fields' => [
            'photo',
            'first_name',
            'second_name',
            'first_last_name',
            'second_last_name',
            'elector_key',
            'phone',
            'origin',
            'state',
            'municipality',
            'section',
            'age',
            'elector_key_valid',
            'rol'
        ],
        'includes' => [
            'documents',
            'sections'
        ],
    ],

    'affiliates_documents' => [
        'sorts' => [
            'id',
            'file_name',
            'file_name_upload',
            'path_file',
            'observations',
            'affiliate_id',
            'document_classification_id',
        ],
        'fields' => [
            'id',
            'file_name',
            'file_name_upload',
            'path_file',
            'observations',
            'affiliate_id',
            'document_classification_id',
        ],
        'includes' => [
            'classification'
        ],
    ],

    'messages' => [
        'sorts' => [
            'id',
            'title',
            'message',
            'type',
            'whatsapp',
            'email',
            'sms',
            'type_message',
            'created_at'
        ],
        'fields' => [
            'id',
            'title',
            'message',
            'type',
            'whatsapp',
            'email',
            'sms',
            'type_message'
        ],
        'includes' => [
            'affiliates',
            'sections',
            'images'
        ]
    ],

    'events' => [
        'sorts' => [
            'id',
            'title',
            'description',
            'type',
            'event_date_time',
            'durability',
            'created_at'
        ],
        'fields' => [
            'id',
            'title',
            'description',
            'type',
            'event_date_time',
            'durability'
        ],
        'includes' => [
            'affiliates',
            'sections',
            'images'
        ]
    ],

    'diffusion' => [
        'sorts' => [
            'id',
            'name',
            'type'

        ],
        'fields' => [
            'id',
            'name',
            'type',

        ],
        'includes' => [
            'affiliates',
            'sections',
        ]
    ]

];
