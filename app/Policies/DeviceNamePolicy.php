<?php

namespace App\Policies;

use App\Models\DeviceName;
use App\Models\User;

class DeviceNamePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any-devicename');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, DeviceName $deviceName): bool
    {
        return $user->can('view-devicename');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create-devicename');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, DeviceName $deviceName): bool
    {
        return $user->can('update-devicename');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, DeviceName $deviceName): bool
    {
        return $user->can('delete-devicename');
    }
}
