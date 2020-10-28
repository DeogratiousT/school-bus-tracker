<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PassSetController extends Controller
{
    public function index()
    {
        return view('auth.pass_set');
    }
}
