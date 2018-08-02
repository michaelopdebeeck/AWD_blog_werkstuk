<?php

namespace App\Policies;

use App\Model\admin\admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the admin.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\admin  $admin
     * @return mixed
     */
    public function view(admin $user)
    {
        //
    }

    /**
     * Determine whether the user can create admins.
     *
     * @param  \App\Model\user\User  $user
     * @return mixed
     */
    public function create(admin $user) {
        return $this->getPermission($user, 4);
    }

    /**
     * Determine whether the user can update the admin.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\admin  $admin
     * @return mixed
     */
    public function update(admin $user) {
        return $this->getPermission($user, 5);
    }

    /**
     * Determine whether the user can delete the admin.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\admin  $admin
     * @return mixed
     */
    public function delete(admin $user) {
        return $this->getPermission($user, 6);
    }

    /**
     * Determine whether the user can restore the admin.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\admin  $admin
     * @return mixed
     */
    public function restore(admin $user)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the admin.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\admin  $admin
     * @return mixed
     */
    public function forceDelete(admin $user)
    {
        //
    }

    protected function getPermission($user, $p_id) {
        foreach ($user->roles as $role) {
            foreach ($role->permissions as $permission) {
                if ($permission->id == $p_id) {
                    return true;
                }
            }
        }
        return false;
    }
}
