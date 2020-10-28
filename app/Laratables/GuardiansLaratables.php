<?php

namespace App\Laratables;

class GuardiansLaratables
{
    public static function laratablesQueryConditions($query)
    {
        return $query->where('role_id', '2');
    }

    public static function laratablesCustomAction($guardian)
    {
        return view('guardians.index_action', compact('guardian'))->render();
    }

}
