<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail; 
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'nationalId', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * create a role relationship
     * 
     * @return belongsTo relationship
     */
    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    /**
     * Checks if user is a super admin
     *
     * @return boolean
     */
    public function isSuperAdmin() : bool
    {
        return (bool) $this->is_super_admin;
    }

    /**
     * Create admin.
     *
     * @param array $details
     * @return array
     */
    public function createSuperAdmin(array $details) : self
    {
        $user = new self($details);

        if (! $this->superAdminExists()) {
            $user->is_super_admin = 1;
        }

        $user->save();

        return $user;
    }

    /**
     * Checks if super admin exists
     *
     * @return integer
     */
    public function superAdminExists() : int
    {
        return self::where('is_super_admin', 1)->count();
    
    }

    public function pupils()
    {
        while ($this->role == 'parent') {
            return $this->belongsToMany('App\Pupil','guardian_pupil', 'guardian_id', 'pupil_id');
        }

        return back()->with("error","you are ".$this->role);
    }
}
