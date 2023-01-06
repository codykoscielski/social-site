<?php

use Illuminate\Support\Facades\Route;

//Import the app controller
use App\Http\Controllers\SocialController;
use App\Http\Controllers\UserController;

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

Route::get('/', [SocialController::class, "homepage"]);

Route::get('/post', [SocialController::class, "post"]);

Route::post('/register', [UserController::class, "registerAccount"] );
