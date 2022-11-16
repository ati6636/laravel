<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminHomeController;

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
Route::get('/admin', [AdminHomeController::class,'index'])->name('admin.home');
