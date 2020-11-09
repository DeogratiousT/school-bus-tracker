<?php

namespace App\Laratables;

class VehiclesLaratables
{
    // public static function laratablesQueryConditions($query)
    // {
    //     return $query->where('role_id', '2');
    // }

    public static function laratablesCustomAction($vehicle)
    {
        return view('vehicles.index_action', compact('vehicle'))->render();
    }

}
