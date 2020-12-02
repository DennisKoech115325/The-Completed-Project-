<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[PagesController::class,'Home']);
Route::get('/index', [PagesController::class,'index']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('posts','PostsController');
Route::resource('wishlists','WishlistController');
Route::resource('users','UsersController');
Route::group(['middleware'=>['admin','auth']], function(){
    Route::get('/dashboard',function(){
        return view('admin.master')->with('success','Welcome Admin');
    });
});
Route::get('/list_users', [App\Http\Controllers\AdminController::class, 'user_list']);
Route::get('/list_posts', [App\Http\Controllers\AdminController::class, 'post_list']);
