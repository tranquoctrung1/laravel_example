<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\User\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\MenuController;

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
    return view('welcome');
});

Route::prefix('/admin/user/login')->group(function() {
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/post', [LoginController::class, 'post']);
});

Route::middleware(['auth'])->group(function() {
    Route::prefix('/admin')->group(function() {
        Route::get('/main', [MainController::class, 'index'])->name('admin');

        Route::prefix('/menu')->group(function() {
            Route::get('/add', [MenuController::class, 'create']);
            Route::post('/add/post', [MenuController::class, 'add']);
        });
    });
});

