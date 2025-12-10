<?php

return [
    'label' => 'Inventaris',
    'plural_label' => 'Inventaris',
    'navigation_label' => 'Inventaris',

    'columns' => [
        'inventory_number' => 'Nomor Inventaris',
        'device_name_id' => 'Nama Perangkat',
        'location_id' => 'Lokasi',
        'type_id' => 'Tipe',
        'brand_id' => 'Merek',
        'customer_id' => 'Pelanggan',
        'device_id' => 'Perangkat',
        'quantity' => 'Jumlah',
        'last_calibration_date' => 'Tanggal Kalibrasi Terakhir',
        'next_calibration_date' => 'Tanggal Kalibrasi Berikutnya',
        'status' => 'Status',
        'notes' => 'Catatan',
        'serial_number' => 'Nomor Seri',
        'procurement_year' => 'Tahun Pengadaan',
        'created_at' => 'Dibuat pada',
        'updated_at' => 'Diperbarui pada',
        'device_name' => 'Nama Perangkat',
        'brand' => 'Merek',
        'type' => 'Tipe',
    ],

    'actions' => [
        'edit' => 'Edit',
        'delete' => 'Hapus',
        'view' => 'Lihat',
        'create' => 'Buat',
        'cancel' => 'Batal',
        'create_success' => ':label berhasil dibuat',
        'edit_success' => ':label berhasil diperbarui',
        'delete_success' => ':label berhasil dihapus',
        'delete_multiple_success' => ':label terpilih berhasil dihapus',
    ],

    'form' => [
        'device_name_id' => [
            'label' => 'Nama Perangkat',
            'placeholder' => 'Pilih nama perangkat',
            'create_device_name_modal_heading' => 'Buat Nama Perangkat',
        ],
        'name' => [
            'label' => 'Nama',
        ],
        'brand' => [
            'label' => 'Merek',
        ],
        'location_id' => [
            'label' => 'Lokasi',
            'placeholder' => 'Pilih lokasi',
            'create_location_modal_heading' => 'Buat Lokasi',
        ],
        'type_id' => [
            'label' => 'Tipe',
            'placeholder' => 'Pilih tipe',
            'create_type_modal_heading' => 'Buat Tipe',
        ],
        'brand_id' => [
            'label' => 'Merek',
            'placeholder' => 'Pilih merek',
            'create_brand_modal_heading' => 'Buat Merek',
        ],
        'device_id' => [
            'label' => 'Perangkat',
            'placeholder' => 'Pilih perangkat',
        ],
        'quantity' => [
            'label' => 'Jumlah',
        ],
        'last_calibration_date' => [
            'label' => 'Tanggal Kalibrasi Terakhir',
        ],
        'status' => [
            'label' => 'Status',
            'placeholder' => 'Pilih status',
        ],
        'notes' => [
            'label' => 'Catatan',
        ],
        'serial_number' => [
            'label' => 'Nomor Seri',
        ],
        'procurement_year' => [
            'label' => 'Tahun Pengadaan',
        ],
    ],
];