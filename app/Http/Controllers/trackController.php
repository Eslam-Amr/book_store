<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class trackController extends Controller
{
    //
    function index(){
        return  view('track.index');
     }
}
