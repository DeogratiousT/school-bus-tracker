<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = ['type','plateNo','capacity','driver_id','assistant_id'];

    public function driver()
    {
        return $this->hasOne('App\User','id','driver_id');        
    }

    public function assistant()
    {
        return $this->hasOne('App\User','id','assistant_id');        
    }
}
