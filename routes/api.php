<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClipsController;
use App\Http\Controllers\UserController;
use Illuminate\Routing\RouteRegistrar;

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

#Route::middleware('auth:api')->get('/user', function (Request $request) {
   # return $request->user();
#});

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/clips', [ClipsController::class, 'getShow']);

Route::group(['middleware'=> 'auth:api'], function(){
    
    Route::post('/logout', [UserController::class, 'logOut']);
    Route::post('/userupdate',[UserController::class, 'postUpdateUser']);
    Route::post('/clips/create', [ClipsController::class, 'postCreate']);
    Route::post('/clips/delete', [ClipsController::class, 'postDelete']);
    Route::post('/clips/update', [ClipsController::class, 'postUpdate']);
    Route::get('/verificar',[UserController::class, 'getVerificar']);
    Route::post('/clips/user',[ClipsController::class,'postClipsUser']);
    Route::post('/user', [UserController::class, 'postUser']);
    
});

