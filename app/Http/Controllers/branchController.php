<?php

namespace App\Http\Controllers;

use App\Models\Branche;
use Illuminate\Http\Request;

class branchController extends Controller
{
    //
    function index(){
        $branch = Branche::get()->all();
        // dd($branch);
        return view('branch.index',['branchs'=>$branch]);
    }
}
