<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\EmployeePageController;



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

Route::get('/', [UserAuthController::class, 'login']);






Route::get('/login', [UserAuthController::class, 'login']);
Route::get('/logout', [UserAuthController::class, 'logout']);
Route::post('/login-user', [UserAuthController::class, 'loginUser'])->name('login-user');




Route::get('admin/dashboard', [AdminPageController::class, 'dashboard']);
Route::get('admin/projects', [AdminPageController::class, 'projects']);
Route::get('admin/salary', [AdminPageController::class, 'salary']);
Route::get('admin/employee', [AdminPageController::class, 'employee']);
Route::get('admin/users', [AdminPageController::class, 'users']);
Route::get('admin/leaves', [AdminPageController::class, 'leaves']);



Route::resource('salary', SalaryController::class);
Route::resource('leaves', LeaveController::class);
Route::resource('projects', ProjectController::class);
Route::resource('employees', EmployeeController::class);
Route::resource('users', UserController::class);


Route::get('employee/dashboard', [EmployeePageController::class, 'dashboard']);
