<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserPageController;

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

Route::get('/', [UserPageController::class, 'index']);






Route::get('/login', [UserAuthController::class, 'login']);
Route::get('/logout', [UserAuthController::class, 'logout']);
Route::post('/login-user', [UserAuthController::class, 'loginUser'])->name('login-user');




Route::get('user/dashboard', [UserPageController::class, 'dashboard']);
Route::get('user/projects', [UserPageController::class, 'projects']);
Route::get('user/salary', [UserPageController::class, 'salary']);
Route::get('user/employee', [UserPageController::class, 'employee']);
Route::get('user/users', [UserPageController::class, 'users']);
Route::get('user/leaves', [UserPageController::class, 'leaves']);

Route::get('site/bookings', [SiteController::class, 'index']);
Route::resource('bookings', BookingController::class);
Route::get('site/bookdetails', [SiteController::class, 'bookRegistration']);
Route::post('book-register', [SiteController::class, 'bookRegister'])->name('book-register');


Route::resource('salary', SalaryController::class);
Route::resource('leaves', LeaveController::class);
Route::resource('projects', ProjectController::class);
Route::resource('employees', EmployeeController::class);
Route::resource('users', UserController::class);
