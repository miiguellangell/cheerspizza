<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacturasController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingsController;
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
    return view('frontend.profile');
});


Route::put('/settings', [SettingsController::class, 'update'])->name('admin.settings.update');



Auth::routes();

Route::get('/', [UserController::class, 'profile'])->middleware('auth')->name('home'); 



Route::resource('facturas', FacturasController::class); 
Route::resource('clientes', UserController::class); 
Route::get('/users/{user}/profile', [UserController::class, 'profile'])->name('frontend.profile');




