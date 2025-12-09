<?php

return [
    'label' => 'Device',
    'plural_label' => 'Devices',
    'navigation_label' => 'Devices',

    'columns' => [
        'deviceId' => 'Device ID',
        'device_name_id' => 'Device Name',
        'device_number' => 'Device Number',
        'serial_number' => 'Serial Number',
        'location_id' => 'Location',
        'type_id' => 'Type',
        'brand_id' => 'Brand',
        'customer_id' => 'Customer',
        'admin_id' => 'Admin',
        'user_id' => 'PIC',
        'calibration_date' => 'Calibration Date',
        'next_calibration_date' => 'Next Calibration Date',
        'status' => 'Status',
        'description' => 'Description',
        'image' => 'Image',
        'qr_code' => 'QR Code',
        'created_at' => 'Created at',
        'updated_at' => 'Updated at',
        'pic_id' => 'PIC',
        'calibrated_date' => 'Calibrated Date',
        'cert_number' => 'Certificate Number',
        'result' => 'Result',
        'procurement_year' => 'Procurement Year',
        'location' => 'Location',
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
        'generate_empty_qr' => 'Generate Empty QR Codes',
    ],

    'form' => [
        'device_name_id' => [
            'label' => 'Device Name',
            'placeholder' => 'Select device name',
            'create_device_name_modal_heading' => 'Create Device Name',
        ],
        'device_number' => [
            'label' => 'Device Number',
        ],
        'serial_number' => [
            'label' => 'Serial Number',
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
        'customer_id' => [
            'label' => 'Customer',
            'placeholder' => 'Select customer',
            'create_customer_modal_heading' => 'Create Customer',
        ],
        'admin_id' => [
            'label' => 'Admin',
            'placeholder' => 'Select admin',
        ],
        'user_id' => [
            'label' => 'PIC',
            'placeholder' => 'Select PIC',
        ],
        'calibration_date' => [
            'label' => 'Calibration Date',
        ],
        'status' => [
            'label' => 'Status',
            'placeholder' => 'Select status',
        ],
        'description' => [
            'label' => 'Description',
        ],
        'image' => [
            'label' => 'Image',
        ],
        'name' => [
            'label' => 'Name',
        ],
        'brand' => [
            'label' => 'Brand',
        ],
        'phone_number' => [
            'label' => 'Phone Number',
        ],
        'address' => [
            'label' => 'Address',
        ],
        'procurement_year' => [
            'label' => 'Procurement Year',
        ],
        'calibrated_date' => [
            'label' => 'Calibrated Date',
        ],
        'result' => [
            'label' => 'Result',
            'options' => [
                'fit_for_use' => 'Fit For Use',
                'not_fit_for_use' => 'Not Fit For Use',
            ],
        ],
        'status_options' => [
            'available' => 'Available',
            'unavailable' => 'Unavailable',
        ],
        'cert_number' => [
            'label' => 'Certificate Number',
        ],
    ],
    
    'filters' => [
        'filled' => [
            'label' => 'Filled',
        ],
        'empty' => [
            'label' => 'Empty',
        ],
        'partially_filled' => [
            'label' => 'Partially Filled',
        ],
    ],

    'status' => [
        'available' => 'Available',
        'in_use' => 'In Use',
        'maintenance' => 'Maintenance',
        'out_of_order' => 'Out of Order',
        'retired' => 'Retired',
    ],
];