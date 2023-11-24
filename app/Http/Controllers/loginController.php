<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    //
    function index()
    {
        return view('login.index');
    }
    function login(Request $request)
    {
        // dd($request->all());
        $validator = $this->validateLogin($request->all());
        $validator->validate();


        $guards=array_keys(array_slice(config('auth.guards'),0,-1));
        // dd($guards[1]=='admin');
foreach($guards as $guard){

    if(Auth::guard($guard)->attempt($validator->validated())){
 if($guard=='admin')
 return redirect()->route('admin.index');
 if($guard=='user')
     return redirect()->route('home.index');

        // return redirect()->route('home');

    }
}




        // dd($validator);
        // if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
        // if (Auth::attempt($validator->validated())) {
        //     return redirect()->route('home.index');
        // }
        return back()->with('message', 'invalid email or password');
        // $guard=array_slice(config('auth.guards'),0,-1);
        // foreach(array_keys($guard) as $guard){

        // if(Auth::guard($guard)->attempt($validator->validated())){
        // }

        // }
        // if(Auth::guard('admin')->attempt($validator->validated())){
        // }
        //اعرض ال user
        //auth()->user()
        //Auth::user()
    }
    function register(Request $request)
    {
        $validator = $this->validateRegister($request->all());
        $validator->validate();
        $user = User::create($validator->validated());
        Auth::login($user);
        return redirect()->route('home.index');
    }
    function logout()
    {
        Auth::logout();
        return redirect()->route('home.index');
    }
    function validateLogin($data)
    {
        return Validator::make($data, [
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);
    }
    function validateRegister($data)
    {
        return Validator::make($data, [
            'user_name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5',
        ]);
    }
}
