<?php

return [
    'label' => 'Logbook',
    'plural_label' => 'Logbooks',
    'navigation_label' => 'Logbooks',

    'columns' => [
        'log_number' => 'Log Number',
        'inventory_id' => 'Inventory',
        'location_id' => 'Location',
        'pic_id' => 'PIC',
        'date' => 'Date',
        'status' => 'Status',
        'created_at' => 'Created at',
        'updated_at' => 'Updated at',
        'inventory' => 'Inventory',
        'start_date' => 'Start Date',
        'end_date' => 'End Date',
        'location' => 'Location',
        'pic' => 'PIC',
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
        'inventory_id' => [
            'label' => 'Inventory',
            'placeholder' => 'Select inventory',
            'get_option_label_from_record_using' => 'Inventory Number - Device Name',
        ],
        'location_id' => [
            'label' => 'Location',
            'placeholder' => 'Select location',
        ],
        'pic_id' => [
            'label' => 'PIC',
            'placeholder' => 'Select PIC',
        ],
        'date' => [
            'label' => 'Date',
        ],
        'status' => [
            'label' => 'Status',
            'placeholder' => 'Select status',
        ],
        'accessories' => [
            'label' => 'Accessories',
        ],
        'start_date' => [
            'label' => 'Start Date',
        ],
        'end_date' => [
            'label' => 'End Date',
        ],
    ],
];