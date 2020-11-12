<?php

namespace App\Laratables;

class VehiclesLaratables
{
    public static function laratablesCustomDriver($vehicle)
    {
        return view('vehicles.index_driver', compact('vehicle'))->render();
    }

    public static function laratablesCustomAssistant($vehicle)
    {
        return view('vehicles.index_assistant', compact('vehicle'))->render();
    }

    public static function laratablesCustomAction($vehicle)
    {
        return view('vehicles.index_action', compact('vehicle'))->render();
    }

    public static function laratablesAdditionalColumns()
    {
        return ['driver_id', 'assistant_id'];
    }
}
