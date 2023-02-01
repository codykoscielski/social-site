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
Route::get('/', [UserController::class, "showCorrectHomepage"])->name('login');
Route::post('/register', [UserController::class, "registerAccount"])->middleware('guest');
Route::post('/login', [UserController::class, "login"])->middleware('guest');
Route::post('/logout', [UserController::class, "logout"])->middleware('mustBeLoggedIn');

//Blog related routes
Route::get('/create-post', [postController::class, "showCreateForm"])->middleware('mustBeLoggedIn');
Route::post('/create-post', [postController::class, "createPost"])->middleware('mustBeLoggedIn');
Route::get('/post/{post}', [postController::class, "viewSinglePost"]);
Route::get('/post', [SocialController::class, "post"]);
Route::delete('/post/{post}', [postController::class, "deletePost"])->middleware('can:delete,post');
Route::get('/post/{post}/edit', [postController::class, 'showEditForm'])->middleware('can:update,post');
Route::put('/post/{post}', [postController::class, 'updatePost'])->middleware('can:update,post');
//Profile related routes
Route::get('/profile/{user:username}', [UserController::class, 'userProfile']);