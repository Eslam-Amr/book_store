<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cart_product;
use App\Models\Order;
use App\Models\order_product;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //
    function index()
    {

        $cart = Cart::where('user_id', auth()->user()->id)->get()->all()[0];
        // dd($cart);
        $cartItems = Cart_product::where('cart_id', $cart->id)->get()->all();
        $products = [];
        // dd($cartItems);
        foreach ($cartItems as $cartItem) {
            $products[] = Product::where('id', $cartItem->id)->get()->all();
        }
        // dd($products);
        return view('order.index', ['products' => $products, 'cartItem' => $cartItems]);
    }
    function done(Request $request)
    {
        $cart = Cart::where('user_id', auth()->user()->id)->get()->all()[0];
        // dd($cart);
        $cartItems = Cart_product::where('cart_id', $cart->id)->get()->all();
        $products = [];
        // dd($cartItems);
        foreach ($cartItems as $cartItem) {
            $products[] = Product::where('id', $cartItem->id)->get()->all();
        }
        $request->validate([
            "governorate" => 'required|min:3',
            "address" => 'required|min:3',
            "phone" => 'required|min:10|max:12',
            "email" => 'required|min:3|email',
            "notes" => 'required|min:3',
        ]);
        Order::create([
            'governorate' => $request->governorate,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'notes' => $request->notes,
            'user_id' => auth()->user()->id,
            'total' => 0,
            'status' => 'pending',
        ]);
        $order=Order::where('user_id',auth()->user()->id)->first()->all();
        // dd($order[0]->id);
        for($i=0;$i<count($products);$i++){

            order_product::create([
                'order_id'=>$order[0]->id,
                'product_id'=>$products[$i][0]->id,
                'quantity'=>$cartItems[$i]->quantity,
                'price'=>$cartItems[$i]->price,
                ]);
                $product=Product::where('id',$cartItems[$i]->product_id)->first()->all();
                Product::find($cartItems[$i]->product_id)->update(['stock'=>($product[0]->stock-$cartItems[$i]->quantity)]);

            }
            // dd($cart);
            for($i=0;$i<count(Cart_product::where('cart_id',$cart->id)->get()->all());$i++){
dump($cart[$i]);
// dump(Cart_product::where('cart_id',$cart[$i]));
                // Cart_product::where('cart_id',$cart[$i][0]->id)->delete();
            }
            // die;
            // dd(Cart_product::where('cart_id',$cart->id)->get()->all());
            if(Cart_product::find($cart->id,'cart_id')!=null)
            Cart_product::find($cart->id,'cart_id')->delete();
            // DB::table('cart_products')->find($cart->id,'cart_id')->delete();
            Cart::find(auth()->user()->id,'user_id')->delete();
            // DB::table('cart')->get('user_id',auth()->user()->id)->delete();
return  redirect()->to('/home/order/track') ;
                // dd($request);
    }
    function track(){
        // dd(auth()->user());
        $order=Order::where('user_id',auth()->user()->id)->first();
        // dd($order);
        $allOrder=order_product::where('order_id',$order->id)->get();
        // dd($allOrder);
        $products=[];
        foreach($allOrder as $allorder){
            $products[]=Product::where('id',$allorder->product_id)->get();
        }
// dd($products);
return view('order.track',['order'=>$order,'orders'=>$allOrder,'products'=>$products]);
    }
}
