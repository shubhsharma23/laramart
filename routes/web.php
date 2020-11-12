<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\adminController;

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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();


//routes for main pages of sites
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::view('bucket','bucket')->name('bucket');
Route::get('add-cart/{product}',[HomeController::class,'add'])->name('add-cart');
Route::get('/remove/{id}', [HomeController::class,'remove'])->name('remove');


//list of users in database
Route::get('/list',[HomeController::class,'list']);



// routes for admin section
Route::get('admin',[adminController::class,'admin'])->name('admin');
Route::get('status/{operation}/{id}',[adminController::class,'status'])->name('status');
Route::get('manage/{id?}',[adminController::class,'manage_product'])->name('manage');
Route::post('manage/add/{id?}',[adminController::class,'add_product'])->name('manage/add');
Route::post('manage/update/{id?}',[adminController::class,'edit_product'])->name('manage/update');
Route::get('manage/delete/{id?}',[adminController::class,'delete_product'])->name('manage/delete');