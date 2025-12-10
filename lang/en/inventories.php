<?php

return [
    'label' => 'Inventory',
    'plural_label' => 'Inventories',
    'navigation_label' => 'Inventories',

    'columns' => [
        'inventory_number' => 'Inventory Number',
        'device_name_id' => 'Device Name',
        'location_id' => 'Location',
        'type_id' => 'Type',
        'brand_id' => 'Brand',
        'customer_id' => 'Customer',
        'device_id' => 'Device',
        'quantity' => 'Quantity',
        'last_calibration_date' => 'Last Calibration Date',
        'next_calibration_date' => 'Next Calibration Date',
        'status' => 'Status',
        'notes' => 'Notes',
        'serial_number' => 'Serial Number',
        'procurement_year' => 'Procurement Year',
        'created_at' => 'Created at',
        'updated_at' => 'Updated at',
        'device_name' => 'Device Name',
        'brand' => 'Brand',
        'type' => 'Type',
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
        'device_name_id' => [
            'label' => 'Device Name',
            'placeholder' => 'Select device name',
            'create_device_name_modal_heading' => 'Create Device Name',
        ],
        'name' => [
            'label' => 'Name',
        ],
        'brand' => [
            'label' => 'Brand',
        ],
        'location_id' => [
            'label' => 'Location',
            'placeholder' => 'Select location',
            'create_location_modal_heading' => 'Create Location',
        ],
        'type_id' => [
            'label' => 'Type',
            'placeholder' => 'Select type',
            'create_type_modal_heading' => 'Create Type',
        ],
        'brand_id' => [
            'label' => 'Brand',
            'placeholder' => 'Select brand',
            'create_brand_modal_heading' => 'Create Brand',
        ],
        'device_id' => [
            'label' => 'Device',
            'placeholder' => 'Select device',
        ],
        'quantity' => [
            'label' => 'Quantity',
        ],
        'last_calibration_date' => [
            'label' => 'Last Calibration Date',
        ],
        'status' => [
            'label' => 'Status',
            'placeholder' => 'Select status',
        ],
        'notes' => [
            'label' => 'Notes',
        ],
        'serial_number' => [
            'label' => 'Serial Number',
        ],
        'procurement_year' => [
            'label' => 'Procurement Year',
        ],
    ],
];