<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class shopController extends Controller
{
    //
    function index(){
        $books=Product::paginate(12);
        // dd($books);
        return view('shop.index',['books'=>$books]);
    }
}
