<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\User\UserController;
use App\Http\Controllers\Frontend\Visitor\VisitorController;
use App\Http\Controllers\Admin\AdminController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// _______Authentication__________
Route::get('/', [UserController::class, 'index'])->name('home');

Auth::routes();

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/home', [AdminController::class, 'index'])->name('admin');
    Route::get('/appointment/list', [AdminController::class, 'list']);
    Route::get('/appointment/create/{id}', [AdminController::class, 'create']);
    Route::post('/appointment/store', [AdminController::class, 'store']);
});

Route::post('/visitor/store', [VisitorController::class, 'store']);
Route::get('/visitor/index', [VisitorController::class, 'index']);
Route::get('/visitor/edit/{id}', [VisitorController::class, 'edit']);
Route::post('/visitor/update/{id}', [VisitorController::class, 'update']);



