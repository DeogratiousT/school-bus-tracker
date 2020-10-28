<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail; 
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'nationalId', 'role_id',
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
     * Check if Default Password is still in Use
     * 
     * @return bool
     */
    public function is_default_password()
    {
        if (Hash::check('password', $this->password)) {
            return true;
        }

        return false;
    }

    /**
     * create a role relationship
     * 
     * @return belongsTo relationship
     */
    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function pupils()
    {
        while ($this->role_id == '2') {
            return $this->belongsToMany('App\Pupil','guardian_pupil', 'guardian_id', 'pupil_id');
        }

        return back()->with("error","you are ".$this->role);
    }
}
