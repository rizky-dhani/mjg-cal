<?php

return [
    'label' => 'Permission',
    'plural_label' => 'Permissions',
    'navigation_label' => 'Permissions',

    'columns' => [
        'name' => 'Name',
        'guard_name' => 'Guard Name',
        'created_at' => 'Created at',
        'updated_at' => 'Updated at',
    ],

    'actions' => [
        'edit' => 'Edit',
        'delete' => 'Delete',
        'view' => 'View',
        'create' => 'Create',
        'cancel' => 'Cancel',
        'edit_success' => ':label successfully updated',
        'delete_success' => ':label successfully deleted',
        'delete_multiple_success' => 'Selected :label successfully deleted',
    ],

    'form' => [
        'name' => [
            'label' => 'Name',
        ],
        'guard_name' => [
            'label' => 'Guard Name',
            'options' => [
                'web' => 'Web',
                'api' => 'API',
            ],
        ],
    ],
];