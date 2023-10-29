<?php

namespace App\Http\Controllers;

use App\Models\Branche;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class adminController extends Controller
{
    //
    function index(){
        return view('admin.index');
    }
    function diplayUser(){

        $users=User::paginate(5);
        // dd($users);
        return view('admin.displayUser',['users'=>$users]);
    }
    function deleteUser($id){
        // dd($id);
        User::find($id)->delete();
        return redirect()->to('/admin/user')->with('message','deleted successfly');

    }
    function editUser($id)
    {
        $user = User::find($id);
        return view('admin.userUpdate', ['user' => $user]);
    }
    function updateUser($id, Request $request)
    {
        // dd($data);
        $request->validate([
            'first_name' => 'required|min:3|max:30',
            'last_name' => 'required|min:3|max:30',
            'user_name' => 'required|min:3|max:30',
            'email' => "required|email|unique:users,email,$id",
        ]);
        $request->only('name', 'email', 'phone');
        User::find($id)->update($request->except('token','image','password'));
        return redirect()->to('/admin/user')->with('message','updated successfly');
        // dd($id);
        // lknkdnklmlkg;

    }
    function diplayOrder(){
        $orders=Order::paginate(5);

        return view('admin.displayOrder',['orders'=>$orders]);
    }
    function deleteOrder($id){
        Order::find($id)->delete();
        return redirect()->to('/admin/order')->with('message','deleted successfly');

    }
    function editOrder($id){
        $order=Order::find($id);
        return view('admin.editOrder',['order'=>$order]);
    }
    function updateOrder($id, Request $request){
        $request->validate([
            'notes' => 'required|min:3|max:500',
            'governorate' => 'required|min:3|max:500',
            'phone' => 'required',
            'address' => 'required|min:3|max:500',
            'status' => 'required|min:3|max:30',
            'email' => "required|email|unique:orders,email,$id",
        ]);
        $request->only('notes','governorate','phone','address','status','total','email' );
        // dd($request);
        Order::find($id)->update($request->only('notes','governorate','phone','address','status','total','email' ));
        return redirect()->to('/admin/order')->with('message','updated successfly');
    }
    function addBook(){
        return view('admin.addBook');
    }
    function addBanner(){
        return view('admin.addBanner');
    }
    function addSlider(){
        return view('admin.addSlider');
    }
    function Branch(){
        $branchs=Branche::paginate(5);
        return view('admin.branch',['branchs'=>$branchs]);

    }
    function deleteBranch($id){
        Branche::find($id)->delete();
        return redirect()->to('/admin/Branch')->with('message','deleted successfly');
    }
    function addBranch(){
        return view('admin.addBranch');
    }

    function editBranch($id){
        // dd($id);
        $branch=Branche::find($id);
        return view('admin.editBranch',['branch'=>$branch]);
    }
    function updateBranch($id, Request $request){
        // dd($id);
        $request->validate([
            'short_address' => 'required|min:3|max:500',
            'full_address' => 'required|min:3|max:500',
            'phone' => 'required',
            'city' => 'required|min:3|max:80',

        ]);
        $request->only('short_address','full_address','phone','city' );
        // dd($request);
        Branche::find($id)->update($request->only('short_address','full_address','phone','city'));
        return redirect()->to('/admin/Branch')->with('message','updated successfly');
    }

}
