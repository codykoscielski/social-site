<?php

use Illuminate\Support\Facades\Route;

//Import the app controller
use App\Http\Controllers\postController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SocialController;

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

//User related routes
Route::get('/', [UserController::class, "showCorrectHomepage"]);
Route::get('/post', [SocialController::class, "post"]);
Route::post('/register', [UserController::class, "registerAccount"] );
Route::post('/login', [UserController::class, "login"] );
Route::post('/logout', [UserController::class, "logout"]);

//Blog related routes
Route::get('/create-post', [postController::class, "showCreateForm"]);
Route::post('/create-post', [postController::class, "createPost"]);
Route::get('/post/{post}', [postController::class, "viewSinglePost"]);