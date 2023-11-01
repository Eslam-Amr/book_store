<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class favController extends Controller
{
    //
    function getFavByUserId($id)
    {
        return Wishlist::where('user_id', $id)->get();
    }
    function getProductById($id)
    {
        return Product::where('id',$id)->get();
    }
    function index()
    {
// dd(auth()->user()->id);
        $favs = $this->getFavByUserId(auth()->user()->id);
        // dd($favs->all()[0]->product_id);
        $favItems=[];
        foreach($favs as $fav){
            // dump($fav->product_id);
            $favItems[]=$this->getProductById($fav->product_id);
        }
        // die;
// $favItems[]=$this->getProductById($favs->product_id);
// dd($favItems);
        return view('fav.index',['favs'=>$favItems]);
    }
    function remove($id){
        // dd($id);
        // dd(DB::table('wishlists')->where('product_id',$id)->where('user_id',auth()->user()->id)->get()[0]);
        DB::table('wishlists')->where('product_id',$id)->where('user_id',auth()->user()->id)->delete();
        // Wishlist::where('id',$id)->where('user_id',auth()->user()->id)->get()->delete();
        return back()->with('message','deleted succssfuly');
    }
}
