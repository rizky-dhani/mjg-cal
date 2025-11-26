<?php

namespace App\Imports;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class UserImport implements ToModel, WithHeadingRow
{
    use Importable;

    /**
     * @param array $row
     *
     * @return User|null
     */
    public function model(array $row)
    {
        $user = User::create([
            'name' => $row['name'],
            'email' => strtolower($row['email']),
        ]);
        $role = Role::findById($row['role_id']);
        $user->assignRole($role);
        return $user;
    }
}