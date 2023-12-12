<?php

use App\Http\Controllers\StudentActionsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;



Route::get('/', function () {
    return view('users/login');
});

Route::get('/dashboard' , [StudentActionsController::class , 'index'])->name('dashboard');

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

Route::resource('/Assignment',AssignmentController::class);
Route::get('/showQuizzes/{class_id}', [TeacherController::class, 'showQuizzes'])->name('showQuizzes');
Route::get('/showAssignments/{class_id}', [TeacherController::class, 'showAssignments'])->name('showAssignments');
