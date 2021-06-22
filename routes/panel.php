<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\Panel\PanelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Panel\ProductController;
/*
|--------------------------------------------------------------------------
| Admin Panel Routes
|--------------------------------------------------------------------------
|
|
*/

Route::get('/', [PanelController::class, 'index'])->name('panel');
Route::resource('products', 'ProductController');


