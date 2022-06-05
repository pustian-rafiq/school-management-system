<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;
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
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});

// Admin logout
Route::get('admin/logout', [AdminController::class,'Logout'])->name('admin.logout');

//Users routes here 

Route::prefix('users')->group(function () {
    Route::get('/view', [UserController::class,'ViewUser'])->name('user.view');
    Route::get('/add', [UserController::class,'AddUser'])->name('user.add');
    Route::post('/store', [UserController::class,'StoreUser'])->name('user.store');
    Route::get('/edit/{id}', [UserController::class,'EditUser'])->name('user.edit');
    Route::post('/update/{id}', [UserController::class,'UpdateUser'])->name('user.update');
    Route::get('/delete/{id}', [UserController::class,'DeleteUser'])->name('user.delete');
});


//Users profile manage routes here 
Route::prefix('profile')->group(function () {
    Route::get('/view', [ProfileController::class,'ViewProfile'])->name('profile.view');
    Route::get('/edit', [ProfileController::class,'EditProfile'])->name('profile.edit');
    Route::post('/update', [ProfileController::class,'UpdateProfile'])->name('profile.update');
    Route::get('/password/change', [ProfileController::class,'UpdatePassword'])->name('password.change');
});