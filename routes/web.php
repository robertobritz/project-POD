<?php

use App\Http\Controllers\SupplyController;
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

Route::any('supplies/search',  [SupplyController::class, 'search'])->name('supplies.search')->middleware('auth');

Route::get('supplies', [SupplyController::class,'index'])->name('supply.index')->middleware('auth');
Route::get('supplies/{id}/edit', [SupplyController::class,'edit'])->name('supply.edit')->middleware('auth');
Route::put('supplies/{id}', [SupplyController::class,'update'])->name('supply.update')->middleware('auth');
Route::get('supplies/import-supplies',  [SupplyController::class, 'import'])->name('supplies.import')->middleware('auth');;
Route::post('supplies/upload',  [SupplyController::class, 'suppliesUpload'])->name('supplies.upload')->middleware('auth');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
