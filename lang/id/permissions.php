<?php

return [
    'label' => 'Izin',
    'plural_label' => 'Izin',
    'navigation_label' => 'Izin',

    'columns' => [
        'name' => 'Nama',
        'guard_name' => 'Nama Penjaga',
        'created_at' => 'Dibuat pada',
        'updated_at' => 'Diperbarui pada',
    ],

    'actions' => [
        'edit' => 'Edit',
        'delete' => 'Hapus',
        'view' => 'Lihat',
        'create' => 'Buat',
        'cancel' => 'Batal',
        'edit_success' => ':label berhasil diperbarui',
        'delete_success' => ':label berhasil dihapus',
        'delete_multiple_success' => ':label terpilih berhasil dihapus',
    ],

    'form' => [
        'name' => [
            'label' => 'Nama',
        ],
        'guard_name' => [
            'label' => 'Nama Penjaga',
            'options' => [
                'web' => 'Web',
                'api' => 'API',
            ],
        ],
    ],
];