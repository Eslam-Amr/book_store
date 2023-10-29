<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class privateController extends Controller
{
    //
    function index()
    {
        return view('private.index');
    }
}
