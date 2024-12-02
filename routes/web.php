<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\TeacherDashboardController;
use App\Http\Controllers\ClassController;


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
Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup');
Route::post('/signup', [AuthController::class, 'signup']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/student-dashboard', [StudentDashboardController::class, 'index'])
        ->name('student.dashboard')
        ->middleware('role:student');

    Route::get('/teacher-dashboard', [TeacherDashboardController::class, 'index'])
        ->name('teacher.dashboard')
        ->middleware('role:teacher');
    Route::get('/mark-attendance', [AttendanceController::class, 'showForm'])->name('mark.attendance');
    Route::post('/mark-attendance', [AttendanceController::class, 'markAttendance'])->name('mark.attendance.submit');

    Route::get('/add-class', [ClassController::class, 'showForm'])->name('add.class');
    Route::post('/add-class', [ClassController::class, 'storeClass'])->name('add.class.submit');
});


Route::get('/', function () {
    return view('welcome');
});
