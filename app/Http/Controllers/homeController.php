<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class homeController extends Controller
{
    //
    function index(){
        $slider=Slider::get()->where('status','show')->all();
        $banner=Banner::get()->where('status','show')->all();
        $products=Product::get()->all();
        return view('home.index',['sliders'=>$slider,'banners'=>$banner,'products'=>$products]);
    }
}
