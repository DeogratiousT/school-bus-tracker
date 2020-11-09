<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = ['type','plateNo','capacity','driver_id','assistant_id'];

    public function busoperators()
    {
        while ($this->role_id == "3") {
            return $this->hasMany('App\User');
        }

        return back()->with("error","Incorrect Operator-Vehicle connection");
    }
}
