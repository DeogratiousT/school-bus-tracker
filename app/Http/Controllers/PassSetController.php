<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;

class PassSetController extends Controller
{
    public function index()
    {
        return view('auth.pass_set');
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $request->validate([
            'password' => 'required|string|min:8|confirmed'
        ]);

        $user->password = Hash::make($request->password);
        $user->save();
        
        return redirect()->route('home')->with('success','Account setting Complete');
    }
}
