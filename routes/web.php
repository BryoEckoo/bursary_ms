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
    return view('students.login');
});
Route::post('login-custom', [AdminController::class, 'login']);
Route::get('register', function () {
    return view('register');
});
Route::get('login', [UsersController::class, 'Login']);
Route::post('school_details', [UsersController::class, 'stu_details']);
// Route::get('/',[UsersController::class, 'previous'])->name('back');
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
Route::get('students',[AdminController::class, 'applicants'])->name('applicants');
Route::post('delete/{id}',[AdminController::class,'delete']);
Route::post('delete_application/{id}',[AdminController::class,'delete_application']);
Route::post('approve_application/{id}',[AdminController::class,'approve_application']);
Route::get('reports',[AdminController::class, 'reports']);
Route::post('print',[AdminController::class, 'print']);
Route::get('location_report',[AdminController::class, 'location_report']);
Route::post('print_location',[AdminController::class, 'print_location']);
Route::get('users',[AdminController::class, 'users']);
Route::get('reset/{email}/{token}',[AdminController::class, 'reset_pass']);
Route::post('reset_pass',[AdminController::class, 'pass_reset']);
route::post('edit_user/{id}',[AdminController::class, 'edit_user']);
Route::post('change_password/{id}',[AdminController::class, 'change_pass']);
Route::post('add_user',[AdminController::class,'add_user']);
Route::post('edit/{reference_number}',[AdminController::class, 'edit_apps']);
Route::post('update/{id}',[AdminController::class, 'update_user']);
Route::get('beneficiaries',[AdminController::class, 'beneficiary']);
Route::post('upload',[AdminController::class, 'upload_doc']);
Route::get('download/{document}',[AdminController::class, 'download']);
// Students new page
Route::get('students/index',[UsersController::class, 'student_index']);
Route::get('students/new_applications',[UsersController::class, 'student_application']);
Route::post('submit_application',[UsersController::class, 'submit_application']);
Route::get('students/request_application',[UsersController::class, 'student_request']);
Route::post('student_request',[UsersController::class, 'req_search']);
Route::get('students/application',[UsersController::class, 'stu_app']);
Route::get('students/login',[UsersController::class, 'stu_login']);
Route::post('students/login_req',[UsersController::class, 'req_login']);
Route::get('students/register',[UsersController::class, 'stu_register']);
Route::post('students/register_req',[UsersController::class, 'req_register']);
Route::get('students/logout',[UsersController::class, 'stu_logout']);
Route::post('edit/{reference_number}',[UsersController::class, 'edit']);
Route::post('print_beneficiary',[AdminController::class, 'print_beneficiary']);
Route::get('scrab',[AdminController::class, 'scrab']);
Route::post('reset_pass',[UsersController::class,'reset']);
Route::get('amount_reports',[AdminController::class, 'amount_report']);
Route::get('print_reports',[AdminController::class,'print_reports']);
Route::post('print_reports_location',[AdminController::class,'print_reports_location']);
