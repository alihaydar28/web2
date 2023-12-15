<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\StripeController;

// JP
use App\Http\Controllers\CourseAController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ParentsAController;
use App\Http\Controllers\SubjectAController;
use App\Http\Controllers\TeacherAController;
use App\Http\Controllers\WorkshopController;
use App\Http\Controllers\adminAuthController;

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\AdminCourseController;
use App\Http\Controllers\AttendanceAController;

//end JP

//Elie
use App\Http\Controllers\AdminStudentController;
use App\Http\Controllers\AdminTeacherController;

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\StudentActionsController;
use App\Http\Controllers\TeacherAttendanceController;
//Elie




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




//JP

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/students', [AdminStudentController::class, 'index'])->name('admin.students.index');
    Route::get('/admin/students/create', [AdminStudentController::class, 'create'])->name('admin.students.create');
    Route::post('/admin/students', [AdminStudentController::class, 'store'])->name('admin.students.store');
    Route::get('/admin/students/{student}/edit', [AdminStudentController::class, 'edit'])->name('admin.students.edit');
    Route::put('/admin/students/{student}', [AdminStudentController::class, 'update'])->name('admin.students.update');
    Route::delete('/admin/students/{student}', [AdminStudentController::class, 'destroy'])->name('admin.students.destroy');

    Route::get('/admin/teachers', [AdminTeacherController::class, 'index'])->name('admin.teachers.index');
    Route::get('/admin/teachers/create', [AdminTeacherController::class, 'create'])->name('admin.teachers.create');
    Route::post('/admin/teachers', [AdminTeacherController::class, 'store'])->name('admin.teachers.store');
    Route::get('/admin/teachers/{teacher}/edit', [AdminTeacherController::class, 'edit'])->name('admin.teachers.edit');
    Route::put('/admin/teachers/{teacher}', [AdminTeacherController::class, 'update'])->name('admin.teachers.update');
    Route::delete('/admin/teachers/{teacher}', [AdminTeacherController::class, 'destroy'])->name('admin.teachers.destroy');

    Route::get('/admin/courses', [AdminCourseController::class, 'index'])->name('admin.courses.index');
    Route::get('/admin/courses/create', [AdminCourseController::class, 'create'])->name('admin.courses.create');
    Route::post('/admin/courses', [AdminCourseController::class, 'store'])->name('admin.courses.store');
    Route::get('/admin/courses/{course}/edit', [AdminCourseController::class, 'edit'])->name('admin.courses.edit');
    Route::put('/admin/courses/{course}', [AdminCourseController::class, 'update'])->name('admin.courses.update');
    Route::delete('/admin/courses/{course}', [AdminCourseController::class, 'destroy'])->name('admin.courses.destroy');

    /*
Route::middleware(['auth', 'role:Admin'])->group(function () {


    Route::get('/roles-permissions', [RolePermissionController::class, 'roles'])->name('roles-permissions');
    Route::get('/role-create', [RolePermissionController::class, 'createRole'])->name('role.create');
    Route::post('/role-store', [RolePermissionController::class, 'storeRole'])->name('role.store');
    Route::get('/role-edit/{id}', [RolePermissionController::class, 'editRole'])->name('role.edit');
    Route::put('/role-update/{id}', [RolePermissionController::class, 'updateRole'])->name('role.update');

    Route::get('/permission-create', [RolePermissionController::class, 'createPermission'])->name('permission.create');
    Route::post('/permission-store', [RolePermissionController::class, 'storePermission'])->name('permission.store');
    Route::get('/permission-edit/{id}', [RolePermissionController::class, 'editPermission'])->name('permission.edit');
    Route::put('/permission-update/{id}', [RolePermissionController::class, 'updatePermission'])->name('permission.update');



    Route::get('attendance', [AttendanceController::class, 'index'])->name('attendance.index');
});
*/
//Elie
Route::prefix('alumni')->group(function () {
    Route::get('/', [AlumniController::class, 'index'])->name('alumni.index');
    Route::get('/create', [AlumniController::class, 'create'])->name('alumni.create');
    Route::post('/', [AlumniController::class, 'store'])->name('alumni.store');
    Route::get('/{alumni}', [AlumniController::class, 'show'])->name('alumni.show');
    Route::get('/{alumni}/edit', [AlumniController::class, 'edit'])->name('alumni.edit');
    Route::put('/{alumni}', [AlumniController::class, 'update'])->name('alumni.update');
    Route::delete('/{alumni}', [AlumniController::class, 'destroy'])->name('alumni.destroy');

    Route::get('/{alumni}/workshops', [WorkshopController::class, 'index'])->name('alumni.workshops.index');
    Route::get('/{alumni}/workshops/create', [WorkshopController::class, 'create'])->name('alumni.workshops.create');
    Route::post('/{alumni}/workshops', [WorkshopController::class, 'store'])->name('alumni.workshops.store');
    Route::get('/{alumni}/workshops/{workshop}', [WorkshopController::class, 'show'])->name('alumni.workshops.show');
    Route::get('/{alumni}/workshops/{workshop}/edit', [WorkshopController::class, 'edit'])->name('alumni.workshops.edit');
    Route::put('/{alumni}/workshops/{workshop}', [WorkshopController::class, 'update'])->name('alumni.workshops.update');
    Route::delete('/{alumni}/workshops/{workshop}', [WorkshopController::class, 'destroy'])->name('alumni.workshops.destroy');
});
//Elie



Route::get('/attendance/{class_id}', [TeacherAttendanceController::class, 'index'])->name('attendance.index');
Route::post('/attendance/store', [TeacherAttendanceController::class, 'store'])->name('attendance.store');


Route::get('/export-attendees/{class_id}', [ExcelController::class, 'exportAttendeesToExcel'])->name('export-attendees');


Route::get('/checkout', 'App\Http\Controllers\StripeController@checkout')->name('checkout');
Route::post('/session', 'App\Http\Controllers\StripeController@session')->name('session');
Route::get('/success', 'App\Http\Controllers\StripeController@success')->name('success');
