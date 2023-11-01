<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Cart;
use App\Models\Cart_product;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class homeController extends Controller
{
    //
    function getItemById($id)
    {
        return Product::findOrFail($id);
    }
    function getFavById($id)
    {
        // return Wishlist::findOrFail('user_id',$id);
        return Wishlist::where('user_id',$id)->get();
    }
    function getCategoryById($id)
    {
        return Category::findOrFail($id);
    }
    function index()
    {
        $slider = Slider::get()->where('status', 'show')->all();
        $banner = Banner::get()->where('status', 'show')->all();
        $products = Product::get()->all();
        // dd($slider);
        return view('home.index', ['sliders' => $slider, 'banners' => $banner, 'products' => $products]);
    }
    function show($id)
    {
        // dd($fav);
        $product = $this->getItemById($id);
        $category = $this->getCategoryById($product->category_id);
        // dd($category);
        return view('home.show', ['product' => $product, 'category' => $category, 'qun' => 1]);
    }
    function inc($id, $qun)
    {
        $product = $this->getItemById($id);
        if ($product->stock > $qun)
            $qun++;
        $category = $this->getCategoryById($product->category_id);
        return view('home.show', ['product' => $product, 'category' => $category, 'qun' => $qun]);
    }
    function dec($id, $qun)
    {
        $product = $this->getItemById($id);
        if ($qun > 1)
        $qun--;
        $category = $this->getCategoryById($product->category_id);
        return view('home.show', ['product' => $product, 'category' => $category, 'qun' => $qun]);
    }
    function favourite($id){
// dd(auth()->user()['id']);
$fav=$this->getFavById(auth()->user()['id']);
// dd($fav);
foreach($fav as $f){
    // dump($f);
    if($f->product_id==$id){

        Wishlist::find($f->id)->delete();
        return back()->with('message','deleted successfuly');

    }
}
// die;
// if($fav->product_id==$id){

//     Wishlist::delete($fav);
//     return back()->with('message','deleted successfuly');

// }
// else{

    Wishlist::create([
        'user_id'=>auth()->user()['id'],
        'product_id'=>$id
        ]);
        return back()->with('message','added successfuly');
//     }
        // dd($qun);
        // $fav=='1'?'0':'1';
        // $product = $this->getItemById($id);
        // $category = $this->getCategoryById($product->category_id);
        // return view('home.show', ['product' => $product, 'category' => $category,'qun' => $qun,'fav' => $fav]);
    }
    function addToCart($id,$qun){
// dd($id,$qun);
if(Cart::where('user_id', auth()->user()->id)->first()==null){

    Cart::create([
    'user_id'=>auth()->user()->id,
    'status'=>'pending',
    'total'=>0
    ]);
}
$product=$this->getItemById($id);

        $cart = Cart::where('user_id', auth()->user()->id)->first();
        // dd($cart);
        Cart_product::create([
            'cart_id'=>$cart->id,
            'product_id'=>$id,
            'quantity'=>$qun,
            'price'=>$product->price_after_discount

            ]);
            $allPrice = Cart_product::where('cart_id', $cart->id)->get();
            $total = 0;
            foreach ($allPrice as $price) {
                // dump($price->price);
                // dump($price->quantity);
                $total += ($price->price * $price->quantity);
            }
            // dd($total);
        DB::table('carts')->where('user_id',auth()->user()->id)->update(['total' => $total]);
        return  redirect()->back()->with('message','added succssfuly');
    }
}
