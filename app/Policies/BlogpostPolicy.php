<?php

namespace App\Policies;

use App\Model\admin\admin;
use App\Model\user\blogpost;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogpostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the blogpost.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\blogpost  $blogpost
     * @return mixed
     */
    public function view(admin $user, blogpost $blogpost)
    {
        //
    }

    /**
     * Determine whether the user can create blogposts.
     *
     * @param  \App\Model\user\User  $user
     * @return mixed
     */
    public function create(admin $user) {
        return $this->getPermission($user, 1);
    }

    /**
     * Determine whether the user can update the blogpost.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\blogpost  $blogpost
     * @return mixed
     */
    public function update(admin $user) {
        return $this->getPermission($user, 2);
    }

    /**
     * Determine whether the user can delete the blogpost.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\blogpost  $blogpost
     * @return mixed
     */
    public function delete(admin $user) {
        return $this->getPermission($user, 3);
    }

    public function categorie(admin $user) {
        return $this->getPermission($user, 9);
    }
    public function tag(admin $user) {
        return $this->getPermission($user, 8);
    }

    /**
     * Determine whether the user can restore the blogpost.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\blogpost  $blogpost
     * @return mixed
     */
    public function restore(admin $user)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the blogpost.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\blogpost  $blogpost
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
