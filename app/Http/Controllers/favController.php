<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class favController extends Controller
{
    //
    function index(){
        return view('fav.index');
    }
}
