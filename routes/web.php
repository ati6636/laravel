<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\CategoryController;

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
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/laravel', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
|
FrontEnd
Routes
|--------------------------------------------------------------------------
*/
Route::get('/',[HomeController::class,'index'])->name('home');

/*
|--------------------------------------------------------------------------
|
BackEnd
Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware('auth')->group (function(){

  Route::get('/', [AdminHomeController::class,'index'])->name('admin.home');
  Route::get('login', [AdminHomeController::class,'login'])->name('admin.login');
  Route::post('login', [AdminHomeController::class,'loginPost'])->name('admin.login.post');
  Route::get('logout', [AdminHomeController::class,'logout'])->name('admin.logout');

  Route::prefix('category')->group(function(){
    Route::get('/',[CategoryController::class,'index'])->name('admin_category');
    Route::get('add',[CategoryController::class,'add'])->name('admin_category_add');
    Route::post('create',[CategoryController::class,'create'])->name('admin_category_create');
    Route::post('update/{id}',[CategoryController::class,'update'])->name('admin_category_update');
    Route::get('delete/{id}',[CategoryController::class,'destroy'])->name('admin_category_delete');
    Route::get('show',[CategoryController::class,'show'])->name('admin_category_show');

    });

});
