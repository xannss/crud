<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\produkcontroler;
Route::get('/', function () {
    return view('welcome');
});

Route::resource('/produk',produkcontroler::class);




