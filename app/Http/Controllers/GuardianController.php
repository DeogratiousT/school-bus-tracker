<?php

namespace App\Http\Controllers;

use App\User;
use App\Pupil;
use Illuminate\Http\Request;
use Freshbitsweb\Laratables\Laratables;
use App\Laratables\GuardiansLaratables;
use App\Laratables\PupilsLaratables;

class GuardianController extends Controller
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
            return Laratables::recordsOf(User::class, GuardiansLaratables::class);
        }
        return view('guardians.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guardians.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        User::create(
            $request->validate([
                'name' => 'required',
                'phone' => 'required',
                'email' => 'required',
                'nationalId' => 'required'
            ])
        );

        $guardian = User::where('nationalId',$request->nationalId)->first();

        return redirect()->route('parents.show',['guardian'=>$guardian])->with('success', $request->name.' created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $guardian
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $guardian = User::find($id);
        return view('guardians.show',['guardian'=> $guardian]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $guardian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {  
        $guardian = User::find($id);
        return view('guardians.edit',['guardian'=> $guardian]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $guardian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $guardian = User::find($id);
        $guardian->update($request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'nationalId' => 'required'
        ]));
         
        return redirect()->route('parents.show',['guardian' => $guardian])->with('success',$request->name.' details updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $guardian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) 
    {
        $guardian = User::find($id);
        $guardian->delete();
        return redirect()->route('parents.index')->with('success','Parent deleted successfully');
    }
}
