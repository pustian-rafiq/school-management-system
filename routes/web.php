<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setups\StudentClassController;
use App\Http\Controllers\Backend\Setups\StudentYearController;
use App\Http\Controllers\Backend\Setups\StudentGroupController;
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
    Route::get('/password/change', [ProfileController::class,'ChnagePassword'])->name('password.change');
    Route::post('/password/update', [ProfileController::class,'UpdatePassword'])->name('password.update');
});

//Setup management routes  here 
Route::prefix('setups')->group(function () {

    // Student class routes here
    Route::get('/student/class/view', [StudentClassController::class,'ViewStudentClass'])->name('student.class.view');
    Route::get('/student/class/add', [StudentClassController::class,'AddStudentClass'])->name('student.class.add');
    Route::post('/student/class/store', [StudentClassController::class,'StoreStudentClass'])->name('student.class.store');
    Route::get('/student/class/edit/{id}', [StudentClassController::class,'EditStudentClass'])->name('student.class.edit');
    Route::post('/student/class/update/{id}', [StudentClassController::class,'UpdateStudentClass'])->name('student.class.update');
    Route::get('/student/class/delete/{id}', [StudentClassController::class,'DeleteStudentClass'])->name('student.class.delete');

    // Student class routes here
    Route::get('/student/year/view', [StudentYearController::class,'ViewStudentYear'])->name('student.year.view');
    Route::get('/student/year/add', [StudentYearController::class,'AddStudentYear'])->name('student.year.add');
    Route::post('/student/year/store', [StudentYearController::class,'StoreStudentYear'])->name('student.year.store');
    Route::get('/student/year/edit/{id}', [StudentYearController::class,'EditStudentYear'])->name('student.year.edit');
    Route::post('/student/year/update/{id}', [StudentYearController::class,'UpdateStudentYear'])->name('student.year.update');
    Route::get('/student/year/delete/{id}', [StudentYearController::class,'DeleteStudentYear'])->name('student.year.delete');

    // Student class routes here
    Route::get('/student/group/view', [StudentGroupController::class,'ViewStudentGroup'])->name('student.group.view');
    Route::get('/student/group/add', [StudentGroupController::class,'AddStudentGroup'])->name('student.group.add');
    Route::post('/student/group/store', [StudentGroupController::class,'StoreStudentGroup'])->name('student.group.store');
    Route::get('/student/group/edit/{id}', [StudentGroupController::class,'EditStudentGroup'])->name('student.group.edit');
    Route::post('/student/group/update/{id}', [StudentGroupController::class,'UpdateStudentGroup'])->name('student.group.update');
    Route::get('/student/group/delete/{id}', [StudentGroupController::class,'DeleteStudentGroup'])->name('student.group.delete');
});