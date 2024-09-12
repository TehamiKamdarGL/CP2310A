<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
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
    return view('website.index');
})->name('indexpage');

Route::get('/menu', function(){
    return view('website.menu');
});

Route::get('/admin/dashboard', function(){
    return view('admin.index');
})->name('adminindex');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        if(Auth::User()->role == 0){
            return redirect()->route('indexpage');
        }else{
            return redirect()->route('adminindex');
        }
    })->name('dashboard');
});


//Admin Page Routes
Route::get('/admin/products', [AdminController::class , 'productIndex']);
Route::get('/admin/insertproduct', [AdminController::class , 'insertProductView']);
Route::post('/admin/insertproduct', [AdminController::class , 'insertProduct']);
