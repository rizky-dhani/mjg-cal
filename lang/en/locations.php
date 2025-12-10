<?php

return [
    'label' => 'Location',
    'plural_label' => 'Locations',
    'navigation_label' => 'Locations',

    'columns' => [
        'locationId' => 'Location ID',
        'name' => 'Name',
        'created_at' => 'Created at',
        'updated_at' => 'Updated at',
    ],

    'actions' => [
        'edit' => 'Edit',
        'delete' => 'Delete',
        'view' => 'View',
        'create' => 'Create',
        'cancel' => 'Cancel',
        'create_success' => ':label successfully created',
        'edit_success' => ':label successfully updated',
        'delete_success' => ':label successfully deleted',
        'delete_multiple_success' => 'Selected :label successfully deleted',
    ],

    'form' => [
        'name' => [
            'label' => 'Name',
        ],
    ],
];