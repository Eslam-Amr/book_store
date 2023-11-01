<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;

use App\Models\Banner;
use App\Models\Branche;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class adminController extends Controller
{


    //
    function index()
    {
        return view('admin.index');
    }
    function diplayUser()
    {

        $users = User::paginate(5);
        // dd($users);
        return view('admin.displayUser', ['users' => $users]);
    }
    function deleteUser($id)
    {
        // dd($id);
        User::find($id)->delete();
        return redirect()->to('/admin/user')->with('message', 'deleted successfly');
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
        User::find($id)->update($request->except('token', 'image', 'password'));
        return redirect()->to('/admin/user')->with('message', 'updated successfly');
        // dd($id);
        // lknkdnklmlkg;

    }
    function diplayOrder()
    {
        $orders = Order::paginate(5);

        return view('admin.displayOrder', ['orders' => $orders]);
    }
    function deleteOrder($id)
    {
        Order::find($id)->delete();
        return redirect()->to('/admin/order')->with('message', 'deleted successfly');
    }
    function editOrder($id)
    {
        $order = Order::find($id);
        return view('admin.editOrder', ['order' => $order]);
    }
    function updateOrder($id, Request $request)
    {
        $request->validate([
            'notes' => 'required|min:3|max:500',
            'governorate' => 'required|min:3|max:500',
            'phone' => 'required',
            'address' => 'required|min:3|max:500',
            'status' => 'required|min:3|max:30',
            'email' => "required|email|unique:orders,email,$id",
        ]);
        $request->only('notes', 'governorate', 'phone', 'address', 'status', 'total', 'email');
        // dd($request);
        Order::find($id)->update($request->only('notes', 'governorate', 'phone', 'address', 'status', 'total', 'email'));
        return redirect()->to('/admin/order')->with('message', 'updated successfly');
    }
    function addBook()
    {
        return view('admin.addBook');
    }
    function addBanner()
    {
        return view('admin.addBanner');
    }
    function addSlider()
    {
        return view('admin.addSlider');
    }
    function Branch()
    {
        $branchs = Branche::paginate(5);
        return view('admin.branch', ['branchs' => $branchs]);
    }
    function deleteBranch($id)
    {
        Branche::find($id)->delete();
        return redirect()->to('/admin/Branch')->with('message', 'deleted successfly');
    }
    function addBranch()
    {
        return view('admin.addBranch');
    }

    function editBranch($id)
    {
        // dd($id);
        $branch = Branche::find($id);
        return view('admin.editBranch', ['branch' => $branch]);
    }
    function bookValidate($data)
    {
        // return Validator::make($data, [
        //     'stock' => 'decimal|required',
        //     'price' => 'decimal|required',
        //     'discount' => 'decimal|required',
        //     'number_of_pages' => 'decimal|required',
        //     'name' => 'required|min:2|max:60',
        //     'author' => 'required|min:2|max:60',
        //     'category' => 'required|min:2|max:60',
        //     'description' => 'required|min:2|max:1000',
        // ]);
        return $data->validate([
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'discount' => 'required|numeric',
            'number_of_pages' => 'required|numeric',
            'name' => 'required|min:2|max:60',
            'author' => 'required|min:2|max:60',
            'category' => 'required|min:2|max:60',
            'description' => 'required|min:2|max:1000',
        ]);
    }
    function bookCreation($data,$imageName,$categoryId)
{
    // dd($data['price']);
    Product::create([
        'stock' => $data['stock'],
        'price' => $data['price'],
        'discount' => $data['discount'],
        'number_of_pages' => $data['number_of_pages'],
        'name' => $data['name'],
        'author' => $data['author'],
        'category' => $data['category'],
        'description' => $data['description'],
        'image' => $imageName,
        'category_id' => $categoryId['id'],
        'code' =>Str::random(5),
        'status' =>'pending',
        'bestseller' =>'pending',
        'price_after_discount' => $data['price'] *  (1-($data['discount']/100)),
    ]);
    // Product::create([
    //     'stock' => $data->stock,
    //     'price' => $data->price,
    //     'discount' => $data->discount,
    //     'number_of_pages' => $data->number_of_pages,
    //     'name' => $data->name,
    //     'author' => $data->author,
    //     'category' => $data->category,
    //     'description' => $data->description,
    //     'image' => $imageName,
    //     'category_id' => $categoryId,
    //     'code' =>Str::random(5),
    //     'price_after_discount' => $data->price*(1-($data->discount/100)),
    // ]);
}

    function imageProcessing($data, $folderName)
    {
        $image = $data->file('image');
        $ext = $image->getClientOriginalExtension();
        $img = time() . rand(10000, 20000) . rand(10000, 20000) . '.' . $ext;
        $image->move(public_path("uplode/$folderName"), $img);
        return $img;
    }
    function getCategoryFromId($categoryName){
        return Category::where('name',$categoryName)->first();
    }
    function updateBranch($id, Request $request)
    {
        // dd($id);
        $request->validate([
            'short_address' => 'required|min:3|max:500',
            'full_address' => 'required|min:3|max:500',
            'phone' => 'required',
            'city' => 'required|min:3|max:80',

        ]);
        $request->only('short_address', 'full_address', 'phone', 'city');
        // dd($request);
        Branche::find($id)->update($request->only('short_address', 'full_address', 'phone', 'city'));
        return redirect()->to('/admin/Branch')->with('message', 'updated successfly');
    }
    function addB(Request $request)
    {
        $request->validate([
            'status' => 'required|min:3|max:30',
            'image' => 'required|image|mimes:png,jpg,jpeg,gif|mimetypes:image/jpeg,image/png,image/gif'
        ]);
        $imageName = $this->imageProcessing($request, 'Banner');
        Banner::create([
            'status' => $request->status,
            'image' => $imageName
        ]);
        return redirect()->route('admin.addBanner')->with('message', 'added successfly');
    }
    function addS(Request $request)
    {
        $request->validate([
            'status' => 'required|min:3|max:30',
            'image' => 'required|image|mimes:png,jpg,jpeg,gif|mimetypes:image/jpeg,image/png,image/gif'
        ]);
        $imageName = $this->imageProcessing($request, 'Slider');
        Slider::create([
            'status' => $request->status,
            'image' => $imageName
        ]);
        return redirect()->route('admin.addSlider')->with('message', 'added successfly');
    }
    function addBo(Request $request)
    {
        $bookData = $this->bookValidate($request);
        // $bookData->validated();
        // $bookData->$validator->errors();
        // dd($bookData);
        $imageName=$this->imageProcessing($request,'Book');
        $categoryId=$this->getCategoryFromId($request->category);
        // dd($categoryId);
        // Product::create([
        //     'stock' => $request->stock,
        //     'price' => $request->price,
        //     'discount' => $request->discount,
        //     'number_of_pages' => $request->number_of_pages,
        //     'name' => $request->name,
        //     'author' => $request->author,
        //     'category' => $request->category,
        //     'description' => $request->description,
        //     'image' => $imageName,
        //     'category_id' => $categoryId['id'],
        //     'code' =>Str::random(5),
        //     'status' =>'pending',
        //     'bestseller' =>'pending',
        //     'price_after_discount' => $request->price *  (1-($request->discount/100)),
        // ]);
        $this->bookCreation($bookData,$imageName,$categoryId);
        return  redirect()->back()->with('message','added successfuly');
    }
}





















