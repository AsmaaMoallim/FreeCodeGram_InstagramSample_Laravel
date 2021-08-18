<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\FollowsController;
use App\Mail\NewUserWelcomeMail;
use views\emails\welcome_email;

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



Auth::routes();

Route::get('/email', function (){return new NewUserWelcomeMail();});

Route::post('follow/{user}', [FollowsController::class, 'store']);


//Route::get('/email', function () {Mail::to(['tom@myspace.com'])->send(new NewUserWelcomeMail());});
//Route::get('/home', [App\Http\Controllers\ProfileController::class, 'index'])->name('home');

//h
Route::get('/', [PostsController::class, 'index']);
Route::get('/p/create ', [PostsController::class, 'create']);
Route::post('/p', [PostsController::class, 'store']);
Route::get('/p/{post}', [PostsController::class, 'show']);

Route::get('/profile/{user}', [ProfileController::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::Patch('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');

Auth::routes();

Route::get('/index', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
