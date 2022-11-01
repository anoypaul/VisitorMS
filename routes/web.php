<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\User\UserController;
use App\Http\Controllers\Frontend\Visitor\VisitorController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Frontend\FrontDesk\FrontDeskController;
use App\Http\Controllers\Admin\AppointmentController;

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

// _______Route__________
Route::get('/', [UserController::class, 'index'])->name('home');

Auth::routes();

// _______Authentication__________
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/home', [AdminController::class, 'index'])->name('admin');
    Route::get('/appointment/list', [AdminController::class, 'list']);
    Route::get('/appointment/create/{id}', [AdminController::class, 'create']);
    Route::post('/appointment/store', [AdminController::class, 'store']);
    // ________appointment edit & update__________
    Route::get('/appointment/send-data', [AppointmentController::class, 'read']);
    Route::get('/appointment/send-data-edit/{id}', [AppointmentController::class, 'edit']);
    Route::post('/appointment/send-data-update/{id}', [AppointmentController::class, 'update']);
});

// _______Visitor_Route__________
Route::post('/visitor/store', [VisitorController::class, 'store']);
Route::get('/visitor/index', [VisitorController::class, 'index']);
Route::get('/visitor/edit/{id}', [VisitorController::class, 'edit']);
Route::post('/visitor/update/{id}', [VisitorController::class, 'update']);

// _______Front_desk_user_Route__________
Route::get('/front-desk/create', [FrontDeskController::class, 'create']);
Route::post('/front-desk/check', [FrontDeskController::class, 'check']);




