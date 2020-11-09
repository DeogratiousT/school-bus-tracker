<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pupil extends Model
{
    protected $fillable = ['name', 'admissionNo', 'grade', 'gender', 'age', 'disabilities'];

    public function guardians()
    {
        return $this->belongsToMany('App\User', 'guardian_pupil', 'pupil_id', 'guardian_id');
    }

}
