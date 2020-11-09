<?php

namespace App\Laratables;

class BusOperatorsLaratables
{

    public static function laratablesQueryConditions($query)
    {
        return $query->where('role_id', '3');
    }

    public static function laratablesCustomAction($busoperator)
    {
        return view('busoperators.index_action', compact('busoperator'))->render();
    }

}
