<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GudangController;
use App\Http\Controllers\GudangDeliveryController;
use App\Http\Controllers\GudangReturController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\UsersController;
use App\Models\Gudang;
use App\Models\GudangDelivery;
use App\Models\GudangRetur;
use Illuminate\Support\Facades\Route;

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

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'logins'])->name('masuk');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware'=> ['authcheck']], function(){

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('users', UsersController::class);
    Route::resource('gudangs', GudangController::class);
    Route::resource('gudangr', GudangReturController::class);
    Route::resource('penjualans', PenjualanController::class);
    Route::resource('gudangd', GudangDeliveryController::class);

    Route::get('/destroy_gudangd/{id}', [GudangDeliveryController::class, 'destroy'])->name('destroy_gudangd');
    Route::get('/destroy_gudangs/{id}', [GudangController::class, 'destroy'])->name('destroy_gudangs');
    Route::get('/destroy_gudangr/{id}', [GudangReturController::class, 'destroy'])->name('destroy_gudangr');
    Route::get('/destroy_users/{id}', [UsersController::class, 'destroy'])->name('destroy_users');
    Route::get('/destroy_penjualans/{id}', [PenjualanController::class, 'destroy'])->name('destroy_penjualans');
    
    
    Route::post('/validasiQR/{id}', [GudangController::class, 'validasiQR'])->name('validasiQR');

});