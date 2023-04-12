<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

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
    return view('layout.dashboard');
});


Route::get('show',[OrderController::class,'show']) -> name('orders.show');

Route::put('insert',[OrderController::class,'store']) -> name('orders.insert');
Route::delete('delete/{id}',[OrderController::class,'destroy'])->name('orders.delete');
Route::get('change/{id}',[OrderController::class,'changeState'])->name('orders.changeState');
Route::put('update/{id}',[OrderController::class,'update'])->name('orders.update');


Route::get('create_order', function () {
    $status = 0;
    return view('create_order',compact('status'));
});