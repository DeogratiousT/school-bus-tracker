<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The attributes that are guarded.
     *
     * @var array
     */
    protected $guarded = [
        //
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'permissions' => 'array'
    ];


    /**
     * Roles can belong to many users
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }

    /**
     *
     * @param array $permissions
     * @return bool
     */
    // public function hasAccess(array $permissions) : bool
    // {
    //     foreach ($permissions as $permission) {
    //         if ($this->hasPermission($permission))
    //             return true;
    //     }
    //     return false;
    // }

    /**
     * @param string $permission
     * @return bool
     */
    // private function hasPermission(string $permission) : bool
    // {
    //     return $this->permissions[$permission] ?? false;
    // }

    // public function inRole(array $roleSlugs) : bool
    // {
    //     foreach($roleSlugs as $roleSlug){
    //         if($this->hasRole($roleSlug)){
    //             return true;
    //         }
    //     }

    //     return false;
    // }

    // public function hasRole(string $roleSlug) : bool
    // {
    //      return $this->slug == $roleSlug;
    // }

}
