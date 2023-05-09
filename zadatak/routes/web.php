<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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
    $dishes = DB::table('dishes')->get();
    $categories = DB::table('categories')->get();
    return view('welcome',[
        'dishes' => $dishes,
        'categories' => $categories
    ]);
});
