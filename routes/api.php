<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Data;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/insert-data', function (Request $reg) {

    $username = $reg->input('username');
    $url = $reg->input('url');


    try {

        $saved = Data::insert(['user' => $username, 'url' => $url]);
        if ($saved) {
            return response()->json('added');
        }
    } catch (Exception $e) {
        return response()->json($e->getMessage());
    }
});
Route::post('/getdata/{username}', function ($username) {


    try {

        $saved = Data::where('user', $username)->first();
        if ($saved) {
            return response()->json($saved);
        } else {
            return [];
        }
    } catch (Exception $e) {
        return response()->json($e->getMessage());
    }
});
Route::post('/update/{username}', function ($username, Request $reg) {

    $update_user = $reg->input('username');
    try {

        $saved = Data::where('user', $username)
            ->update(['user' => $update_user]);
        if ($saved) {
            return response()->json('updated');
        } else {
            return [];
        }
    } catch (Exception $e) {
        return response()->json($e->getMessage());
    }
});
