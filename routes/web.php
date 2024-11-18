<?php

use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Route;

//* routing for admin
Route::get('/admin',[adminController::class,'getDashboard'])->name('admin-dashboard');

Route::get('/admin/class-list',[adminController::class,'getClassList'])->name('class-list');

Route::get('/admin/class-selector',[adminController::class,'getClassInfo'])->name('class-selector');

Route::get('/admin/student-list',[adminController::class,'showStudentList'])->name('student-list');

Route::get('/admin/teacher-list',[adminController::class,'showTeacherList'])->name('teacher-list');

Route::get('/admin/parent-list',[adminController::class,'getParentList'])->name('parent-list');




//* routing for teacher



//* routing for parent



//* routing for tilawah



//* routing for access

