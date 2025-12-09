<?php

return [
    'label' => 'Buku Log',
    'plural_label' => 'Buku Log',
    'navigation_label' => 'Buku Log',

    'columns' => [
        'log_number' => 'Nomor Log',
        'inventory_id' => 'Inventaris',
        'location_id' => 'Lokasi',
        'pic_id' => 'Penanggung Jawab',
        'date' => 'Tanggal',
        'status' => 'Status',
        'created_at' => 'Dibuat pada',
        'updated_at' => 'Diperbarui pada',
        'inventory' => 'Inventaris',
        'start_date' => 'Tanggal Mulai',
        'end_date' => 'Tanggal Selesai',
        'location' => 'Lokasi',
        'pic' => 'Penanggung Jawab',
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
        'inventory_id' => [
            'label' => 'Inventaris',
            'placeholder' => 'Pilih inventaris',
            'get_option_label_from_record_using' => 'Nomor Inventaris - Nama Perangkat',
        ],
        'location_id' => [
            'label' => 'Lokasi',
            'placeholder' => 'Pilih lokasi',
        ],
        'pic_id' => [
            'label' => 'Penanggung Jawab',
            'placeholder' => 'Pilih penanggung jawab',
        ],
        'date' => [
            'label' => 'Tanggal',
        ],
        'status' => [
            'label' => 'Status',
            'placeholder' => 'Pilih status',
        ],
        'accessories' => [
            'label' => 'Aksesori',
        ],
        'start_date' => [
            'label' => 'Tanggal Mulai',
        ],
        'end_date' => [
            'label' => 'Tanggal Selesai',
        ],
    ],
];