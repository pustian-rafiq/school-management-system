<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setups\AsignSubjectController;
use App\Http\Controllers\Backend\Setups\DesignationController;
use App\Http\Controllers\Backend\Setups\StudentClassController;
use App\Http\Controllers\Backend\Setups\StudentYearController;
use App\Http\Controllers\Backend\Setups\StudentGroupController;
use App\Http\Controllers\Backend\Setups\StudentShiftController;
use App\Http\Controllers\Backend\Setups\StudentFeeCategoryController;
use App\Http\Controllers\Backend\Setups\StudentFeeAmountController;
use App\Http\Controllers\Backend\Setups\ExamTypeCOntroller;
use App\Http\Controllers\Backend\Setups\SchoolSubjectController;
use App\Http\Controllers\Backend\Student\StudentRegController;
use App\Http\Controllers\Backend\Student\StudentRegFeeController;
use App\Http\Controllers\Backend\Student\StudentRollController;
use App\Http\Controllers\PDFController;
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

    // Student year routes here
    Route::get('/student/year/view', [StudentYearController::class,'ViewStudentYear'])->name('student.year.view');
    Route::get('/student/year/add', [StudentYearController::class,'AddStudentYear'])->name('student.year.add');
    Route::post('/student/year/store', [StudentYearController::class,'StoreStudentYear'])->name('student.year.store');
    Route::get('/student/year/edit/{id}', [StudentYearController::class,'EditStudentYear'])->name('student.year.edit');
    Route::post('/student/year/update/{id}', [StudentYearController::class,'UpdateStudentYear'])->name('student.year.update');
    Route::get('/student/year/delete/{id}', [StudentYearController::class,'DeleteStudentYear'])->name('student.year.delete');

    // Student group routes here
    Route::get('/student/group/view', [StudentGroupController::class,'ViewStudentGroup'])->name('student.group.view');
    Route::get('/student/group/add', [StudentGroupController::class,'AddStudentGroup'])->name('student.group.add');
    Route::post('/student/group/store', [StudentGroupController::class,'StoreStudentGroup'])->name('student.group.store');
    Route::get('/student/group/edit/{id}', [StudentGroupController::class,'EditStudentGroup'])->name('student.group.edit');
    Route::post('/student/group/update/{id}', [StudentGroupController::class,'UpdateStudentGroup'])->name('student.group.update');
    Route::get('/student/group/delete/{id}', [StudentGroupController::class,'DeleteStudentGroup'])->name('student.group.delete');

      // Student shift routes here
      Route::get('/student/shift/view', [StudentShiftController::class,'ViewStudentShift'])->name('student.shift.view');
      Route::get('/student/shift/add', [StudentShiftController::class,'AddStudentShift'])->name('student.shift.add');
      Route::post('/student/shift/store', [StudentShiftController::class,'StoreStudentShift'])->name('student.shift.store');
      Route::get('/student/shift/edit/{id}', [StudentShiftController::class,'EditStudentShift'])->name('student.shift.edit');
      Route::post('/student/shift/update/{id}', [StudentShiftController::class,'UpdateStudentShift'])->name('student.shift.update');
      Route::get('/student/shift/delete/{id}', [StudentShiftController::class,'DeleteStudentShift'])->name('student.shift.delete');

       // Student fee category routes here
       Route::get('/student/fee/category/view', [StudentFeeCategoryController::class,'ViewStudentFeeCategory'])->name('student.fee.category.view');
       Route::get('/student/fee/category/add', [StudentFeeCategoryController::class,'AddStudentFeeCategory'])->name('student.fee.category.add');
       Route::post('/student/fee/category/store', [StudentFeeCategoryController::class,'StoreStudentFeeCategory'])->name('student.fee.category.store');
       Route::get('/student/fee/category/edit/{id}', [StudentFeeCategoryController::class,'EditStudentFeeCategory'])->name('student.fee.category.edit');
       Route::post('/student/fee/category/update/{id}', [StudentFeeCategoryController::class,'UpdateStudentFeeCategory'])->name('student.fee.category.update');
       Route::get('/student/fee/category/delete/{id}', [StudentFeeCategoryController::class,'DeleteStudentFeeCategory'])->name('student.fee.category.delete');

        // Student fee amount routes here
        Route::get('/student/fee/amount/view', [StudentFeeAmountController::class,'ViewStudentFeeAmount'])->name('student.fee.amount.view');
        Route::get('/student/fee/amount/add', [StudentFeeAmountController::class,'AddStudentFeeAmount'])->name('student.fee.amount.add');
        Route::post('/student/fee/amount/store', [StudentFeeAmountController::class,'StoreStudentFeeAmount'])->name('student.fee.amount.store');
        Route::get('/student/fee/amount/edit/{id}', [StudentFeeAmountController::class,'EditStudentFeeAmount'])->name('student.fee.amount.edit');
        Route::post('/student/fee/amount/update/{id}', [StudentFeeAmountController::class,'UpdateStudentFeeAmount'])->name('student.fee.amount.update');
        Route::get('/student/fee/amount/details/{id}', [StudentFeeAmountController::class,'DetailsStudentFeeAmount'])->name('student.fee.amount.details');
        // Route::get('/student/fee/amount/delete/{id}', [StudentFeeAmountController::class,'DeleteStudentFeeAmount'])->name('student.fee.amount.delete');

        // Student exam type routes here
        Route::get('/exam/type/view', [ExamTypeCOntroller::class,'ViewExamType'])->name('exam.type.view');
        Route::get('/exam/type/add', [ExamTypeCOntroller::class,'AddExamType'])->name('exam.type.add');
        Route::post('/exam/type/store', [ExamTypeCOntroller::class,'StoreExamType'])->name('exam.type.store');
        Route::get('/exam/type/edit/{id}', [ExamTypeCOntroller::class,'EditExamType'])->name('exam.type.edit');
        Route::post('/exam/type/update/{id}', [ExamTypeCOntroller::class,'UpdateExamType'])->name('exam.type.update');
        Route::get('/exam/type/delete/{id}', [ExamTypeCOntroller::class,'DeleteExamType'])->name('exam.type.delete');

        // School subject routes here
        Route::get('/school/subject/view', [SchoolSubjectController::class,'ViewSchoolSubject'])->name('school.subject.view');
        Route::get('/school/subject/add', [SchoolSubjectController::class,'AddSchoolSubject'])->name('school.subject.add');
        Route::post('/school/subject/store', [SchoolSubjectController::class,'StoreSchoolSubject'])->name('school.subject.store');
        Route::get('/school/subject/edit/{id}', [SchoolSubjectController::class,'EditSchoolSubject'])->name('school.subject.edit');
        Route::post('/school/subject/update/{id}', [SchoolSubjectController::class,'UpdateSchoolSubject'])->name('school.subject.update');
        Route::get('/school/subject/delete/{id}', [SchoolSubjectController::class,'DeleteSchoolSubject'])->name('school.subject.delete');

        // Assign subject routes here
        Route::get('/assign/subject/view', [AsignSubjectController::class,'ViewAssignSubject'])->name('assign.subject.view');
        Route::get('/assign/subject/add', [AsignSubjectController::class,'AddAssignSubject'])->name('assign.subject.add');
        Route::post('/assign/subject/store', [AsignSubjectController::class,'StoreAssignSubject'])->name('assign.subject.store');
        Route::get('/assign/subject/edit/{id}', [AsignSubjectController::class,'EditAssignSubject'])->name('assign.subject.edit');
        Route::post('/assign/subject/update/{id}', [AsignSubjectController::class,'UpdateAssignSubject'])->name('assign.subject.update');
        Route::get('/assign/subject/details/{id}', [AsignSubjectController::class,'DetailsAssignSubject'])->name('assign.subject.details');

        // Designation routes here
        Route::get('/designation/view', [DesignationController::class,'ViewDesignation'])->name('designation.view');
        Route::get('/designation/add', [DesignationController::class,'AddDesignation'])->name('designation.add');
        Route::post('/designation/store', [DesignationController::class,'StoreSchoolSubject'])->name('designation.store');
        Route::get('/designation/edit/{id}', [DesignationController::class,'EditDesignation'])->name('designation.edit');
        Route::post('/designation/update/{id}', [DesignationController::class,'UpdateDesignation'])->name('designation.update');
        Route::get('/designation/delete/{id}', [DesignationController::class,'DeleteDesignation'])->name('designation.delete');

});

//Student register routes here 
Route::prefix('students')->group(function () {
    Route::get('/reg/view', [StudentRegController::class,'ViewStudentRegistration'])->name('student.registration.view');
    Route::get('/reg/add', [StudentRegController::class,'AddStudentRegistration'])->name('student.registration.add');
    Route::post('/reg/store', [StudentRegController::class,'StoreStudentRegistration'])->name('student.registration.store');
    Route::get('/reg/edit/{id}', [StudentRegController::class,'EditStudentRegistration'])->name('student.registration.edit');
    Route::post('/reg/update/{id}', [StudentRegController::class,'UpdateStudentRegistration'])->name('student.registration.update');
    Route::get('/reg/promotion/{student_id}', [StudentRegController::class,'EditStudentPromotion'])->name('student.registration.promotion');
    Route::post('/reg/promotion/update/{student_id}', [StudentRegController::class,'UpdateStudentPromotion'])->name('promotion.student.registration');

    //Generate PDF route here
    Route::get('reg/details/pdf/{student_id}', [StudentRegController::class, 'StudentDetailsPdf'])->name('student.registration.details');

    //Search student using their class and year
    Route::get('/search/year/class', [StudentRegController::class,'SearchStudentByYearClass'])->name('student.search.year.class');
  
    //Generate student roll
    Route::get('/generate/roll', [StudentRollController::class,'ViewRollGenerator'])->name('student.roll.generate.view');
    Route::get('/roll/generate', [StudentRollController::class,'getStudents'])->name('student.registration.getstudents');
    Route::post('/roll/store', [StudentRollController::class,'storeStudentRoll'])->name('student.roll.store');

    //Generate student registration fee
    Route::get('/reg/fee/generate/view', [StudentRegFeeController::class,'ViewRegFeeGenerator'])->name('student.reg.generate.view');
    Route::get('/reg/fee/classwisedata', [StudentRegFeeController::class, 'RegFeeClassData'])->name('student.registration.fee.classwise.get');
    Route::get('/reg/fee/payslip', [StudentRegFeeController::class, 'RegFeePayslip'])->name('student.registration.fee.payslip');
});