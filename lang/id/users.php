<?php

return [
    'label' => 'Pengguna',
    'plural_label' => 'Pengguna',
    'navigation_label' => 'Pengguna',
    'import_users' => 'Impor Pengguna',

    'columns' => [
        'userId' => 'ID Pengguna',
        'name' => 'Nama',
        'email' => 'Email',
        'initial' => 'Inisial',
        'customer_id' => 'Pelanggan',
        'email_verified_at' => 'Email Terverifikasi Pada',
        'password' => 'Kata Sandi',
        'remember_token' => 'Token Ingat',
        'created_at' => 'Dibuat pada',
        'updated_at' => 'Diperbarui pada',
        'roles' => 'Peran',
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
        'reset_password' => 'Reset Kata Sandi',
        'reset_password_success' => 'Kata sandi telah direset berhasil',
        'import_success' => ':plural_label berhasil diimpor',
    ],

    'form' => [
        'name' => [
            'label' => 'Nama',
        ],
        'email' => [
            'label' => 'Email',
        ],
        'initial' => [
            'label' => 'Inisial',
        ],
        'customer_id' => [
            'label' => 'Pelanggan',
            'placeholder' => 'Pilih pelanggan',
        ],
        'password' => [
            'label' => 'Kata Sandi',
        ],
        'roles' => [
            'label' => 'Peran',
        ],
    ],
];