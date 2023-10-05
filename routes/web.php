<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Mpesa;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\App\Http\Middleware\RedirectIfAuthenticated;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('students.index');
});
Route::post('login-custom', [AdminController::class, 'login']);
Route::get('register', function () {
    return view('register');
});
Route::get('login', [UsersController::class, 'Login']);
Route::post('school_details', [UsersController::class, 'stu_details']);
Route::get('/',[UsersController::class, 'previous'])->name('back');
//
Route::get('school_details',[UsersController::class, 'back'])->name('school_details');
Route::get('index',[UsersController::class, 'index']);
Route::post('bursary',[UsersController::class, 'burs_details'])->name('bursary');
Route::post('back_bursary',[UsersController::class, 'b_bursary'])->name('back_bursary');
Route::post('summary',[UsersController::class, 'summary'])->name('summary');
Route::get('bursary',[UsersController::class, 'bursary_b'])->name('bursary');
Route::get('edit_student_details',[UsersController::class, 'edit_student'])->name('edit_student_detail');
Route::get('edit_school',[UsersController::class, 'edit_school'])->name('edit_school');
Route::get('edit_bursary',[UsersController::class, 'edit_bursary'])->name('edit_bursary');
Route::post('students/index',[UsersController::class, 'submit_app'])->name('students_index');
Route::get('send',[UsersController::class, 'mail']);
Route::get('track_process',[UsersController::class,'track'])->name('track_process');
Route::post('track',[UsersController::class, 'check'])->name('track');
Route::get('request_bursary',[UsersController::class, 'request']);
Route::post('request',[UsersController::class, 'req_search']);
Route::get('/mpesa',[Mpesa::class, 'push']);
Route::get('logout',[UsersController::class, 'logout']);
Route::post('reset_password',[AdminController::class, 'reset']);
Route::get('applications',[AdminController::class, 'applications']);
Route::get('applicants',[AdminController::class, 'applicants']);
