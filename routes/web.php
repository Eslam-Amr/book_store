<?php

use App\Http\Controllers\aboutController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\branchController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\favController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\privateController;
use App\Http\Controllers\refController;
use App\Http\Controllers\shopController;
use App\Http\Controllers\trackController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home',[homeController::class,'index'])->name('home.index');
Route::get('/login',[loginController::class,'index'])->name('login.index');
Route::get('/fav',[favController::class,'index'])->name('fav.index');
Route::get('/contact',[contactController::class,'index'])->name('contact.index');
Route::get('/branch',[branchController::class,'index'])->name('branch.index');
Route::get('/ref',[refController::class,'index'])->name('ref.index');
Route::get('/private',[privateController::class,'index'])->name('private.index');
Route::get('/about',[aboutController::class,'index'])->name('about.index');
Route::get('/track',[trackController::class,'index'])->name('track.index');
Route::get('/shop',[shopController::class,'index'])->name('shop.index');
Route::get('/admin',[adminController::class,'index'])->name('admin.index');
Route::get('/admin/user',[adminController::class,'diplayUser'])->name('admin.diplayUser');
Route::get('/admin/user/{id}/delete',[adminController::class,'deleteUser'])->name('admin.deleteUser');
Route::get('/admin/user/{id}/edit',[adminController::class,'editUser'])->name('admin.edit');
Route::put('/admin/user/{id}/update',[adminController::class,'updateUser'])->name('admin.update');

Route::get('/admin/order',[adminController::class,'diplayOrder'])->name('admin.diplayOrder');
Route::get('/admin/order/{id}/delete',[adminController::class,'deleteOrder'])->name('admin.deleteOrder');
Route::get('/admin/order/{id}/edit',[adminController::class,'editOrder'])->name('admin.editOrder');
Route::put('/admin/order/{id}/update',[adminController::class,'updateOrder'])->name('admin.updateOrder');

Route::get('/admin/addBook',[adminController::class,'addBook'])->name('admin.addBook');
Route::get('/admin/addBanner',[adminController::class,'addBanner'])->name('admin.addBanner');
Route::get('/admin/addSlider',[adminController::class,'addSlider'])->name('admin.addSlider');
Route::get('/admin/Branch',[adminController::class,'Branch'])->name('admin.Branch');
Route::get('/admin/Branch/addBranch',[adminController::class,'addBranch'])->name('admin.addBranch');
Route::get('/admin/Branch/{id}/delete',[adminController::class,'deleteBranch'])->name('admin.deleteBranch');
Route::get('/admin/Branch/{id}/edit',[adminController::class,'editBranch'])->name('admin.editBranch');
Route::put('/admin/Branch/{id}/update',[adminController::class,'updateBranch'])->name('admin.updateBranch');
