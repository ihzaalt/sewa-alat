<?php

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

Route::get('/',  [\App\Http\Controllers\HomeController::class, 'index'])->name('homepage');
Route::get('/contact',  [\App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::post('/contact',  [\App\Http\Controllers\HomeController::class, 'contactStore'])->name('contact.store');
Route::get('/detail/{barang:slug}',  [\App\Http\Controllers\HomeController::class, 'detail'])->name('detail');

Route::group(['middleware' => 'is_admin', 'prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard.index')->middleware('auth');
    Route::resource('barang', \App\Http\Controllers\Admin\BarangController::class);
    Route::put('barangs/update-image{id}', [App\Http\Controllers\Admin\BarangController::class, 'updateImage'])->name('barangs.updateImage');

    Route::get('messages', [App\Http\Controllers\Admin\MessageController::class,'index'])->name('messages.index');
    Route::delete('messages/{message}', [App\Http\Controllers\Admin\MessageController::class,'destroy'])->name('messages.destroy');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
