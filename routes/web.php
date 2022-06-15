<?php

use Illuminate\Support\Facades\Route;
use App\Models\Data;
use Illuminate\Http\Request;

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

Route::get('/', function () {
    return "hello"; //view('welcome');
});

Route::get('/insert-data', function (Request $reg) {




    //return Data::all(); //view('welcome');
});
