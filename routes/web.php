<?php

use App\Http\Controllers\EnrollmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\StudentActionsController;



Route::get('/', function () {
    return view('users/login');
});

//Show Register/Create Form
Route::get('/register' , [UserController::class , 'create'])->name('register');

//create New User
Route::post('/users' , [UserController::class , 'store'])->name('store');

// Log In User
Route::post('/authenticate', [UserController::class, 'authenticate'])->name('authenticate');

// show login Form
Route::get('/login', [UserController::class, 'login'])->name('login');

// log User Out
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::resource('/Teacher',TeacherController::class);
Route::resource('/Assignment',AssignmentController::class);
Route::get('/showQuizzes/{class_id}', [TeacherController::class, 'showQuizzes'])->name('showQuizzes');
Route::get('/showAssignments/{class_id}', [TeacherController::class, 'showAssignments'])->name('showAssignments');

//Student

Route::get('/studentDashboard' , [StudentActionsController::class , 'index'])->name('studentDashboard');
Route::get('/enrollmentCourses' , [EnrollmentController::class , 'enrollmentCourses'])->name('enrollmentCourses');
Route::get('/enrollmentClasses/{courseId}' , [EnrollmentController::class , 'enrollmentClasses'])->name('enrollmentClasses');
Route::get('/enroll/{classId}' , [EnrollmentController::class , 'enroll'])->name('enroll');
Route::get('/drop/{classId}' , [EnrollmentController::class , 'drop'])->name('drop');
Route::get('/studentAttendance' , [StudentActionsController::class , 'studentAttendance'])->name('studentAttendance');
