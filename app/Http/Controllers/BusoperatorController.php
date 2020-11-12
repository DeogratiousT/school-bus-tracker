<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Freshbitsweb\Laratables\Laratables;
use App\Laratables\BusoperatorsLaratables;

class BusoperatorController extends Controller
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
            return Laratables::recordsOf(User::class, BusoperatorsLaratables::class);
        }
        return view('busoperators.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('busoperators.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Busoperator  $busoperator
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $busoperator = User::find($id);
        return view('busoperators.show',['busoperator'=> $busoperator]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Busoperator  $busoperator
     * @return \Illuminate\Http\Response
     */
    public function edit(User $busoperator)
    {
        return view('busoperators.edit', ['busoperator'=>$busoperator]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Busoperator  $busoperator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $busoperator = User::find($id);
        $busoperator->update($request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'nationalId' => 'required',
            'sub_role' => 'required',
        ]));

        return redirect()->route('busoperators.show',['busoperator' => $busoperator])->with('success',$request->name.' details updated');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Busoperator  $busoperator
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $busoperator)
    {
        $busoperator->delete();
        return redirect()->route('busoperators.index')->with('success', 'Deleted Successfully');
    }
}
