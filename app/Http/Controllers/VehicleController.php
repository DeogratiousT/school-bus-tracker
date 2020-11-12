<?php

namespace App\Http\Controllers;

use App\Vehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Freshbitsweb\Laratables\Laratables;
use App\Laratables\VehiclesLaratables;
use App\User;

class VehicleController extends Controller
{    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()){
            return Laratables::recordsOf(Vehicle::class, VehiclesLaratables::class);
        }
        return view('vehicles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $drivers = User::where([['role_id','3'],['sub_role','driver']])->get();
        $assistants = User::where([['role_id','3'],['sub_role','assistant']])->get();
        return view('vehicles.create',['drivers'=>$drivers, 'assistants'=>$assistants]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Vehicle::create($request->validate([
            'type' => 'required',
            'plateNo' => 'required',
            'capacity' => 'required',
            'driver_id' => 'nullable',
            'assistant_id' => 'nullable'
        ]));
         
        return redirect()->route('vehicles.index')->with('success', 'Record created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehicle = Vehicle::find($id);
        return view('vehicles.show',['vehicle'=>$vehicle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicle = Vehicle::find($id);
        $drivers = User::where([['role_id','3'],['sub_role','driver']])->get();
        $assistants = User::where([['role_id','3'],['sub_role','assistant']])->get();
        return view('vehicles.edit',['vehicle'=>$vehicle, 'drivers'=>$drivers, 'assistants'=>$assistants]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        //
    }
}
