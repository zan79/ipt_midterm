<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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
    return redirect('/register');
});

Route::get('/register', [AuthController::class, 'registrationPage']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/verification/{user}/{token}', [AuthController::class, 'verification']);

Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard', [PostController::class, 'displayDashboard']);
    Route::get('/newpost', [PostController::class, 'createPost']);
    Route::post('/newpost', [PostController::class, 'storePost']);
    Route::get('/users', [PostController::class, 'showUsers']);
    Route::get('/user/{id}', [PostController::class, 'filterUser']);
    Route::get('/categories/{category}', [PostController::class, 'filterCategory']);
});

