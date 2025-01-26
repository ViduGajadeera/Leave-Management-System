<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\requestLeaveController;
use App\Http\Controllers\UserHomeController;
use App\Http\Controllers\authController;
use App\Http\Controllers\userPendingController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\AdminleaveController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\reportController;
use App\Http\Controllers\registrationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/registration',[registrationController::class,'registration'])->name('registration');

Route::post('/auth',[authController::class,'verify'])->name('auth');

Route::get('/request-leave',[requestLeaveController::class,'index'])->name('request-leave');
Route::post('/submit-leave',[requestLeaveController::class,'submit'])->name('submit-leave');

Route::get('/User-Home',[UserHomeController::class,'index'])->name('User-Home');
Route::get('/pending-leaves',[userPendingController::class,'index'])->name('pending-leaves');
Route::post('/cancel-leave',[userPendingController::class,'cancel'])->name('cancel-leave');
Route::get('/history-leaves',[userPendingController::class,'leaveHistory'])->name('history-leaves');


Route::get('/request-leave-admin',[AdminleaveController::class,'indexadmin'])->name('request-leave-admin');
Route::post('/submit-leave-admin',[AdminleaveController::class,'submitadmin'])->name('submit-leave-admin');


Route::get('/admin-home',[AdminHomeController::class,'pendingLoad'])->name('admin-home');
Route::post('/leave-approve',[LeaveController::class,'accept'])->name('leave-approve');
Route::post('/leave-reject',[LeaveController::class,'reject'])->name('leave-reject');
Route::get('/reports',[reportController::class,'index'])->name('reports');
Route::post('/leave-report',[reportController::class,'submit'])->name('leave-report');






Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
