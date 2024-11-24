<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\studentManagerController;
use App\Http\Controllers\parentManagerController;
use App\Http\Controllers\teacherManagerController;
use App\Http\Controllers\classManagerController;
use Illuminate\Support\Facades\Route;

//* routing for admin
Route::get('/admin',[adminController::class,'getDashboard'])->name('admin-dashboard');

//select class
Route::get('/admin/class-selector',[adminController::class,'getClassInfo'])->name('class-selector');


//class lists
Route::get('/admin/class-list',[adminController::class,'getClassList'])->name('class-list');
Route::get('/admin/class-list/add-manualy',[classManagerController::class,'manual'])->name('add-class-manualy');
Route::get('/admin/class-list/add-document',[classManagerController::class,'document'])->name('add-class-document');
//use this to store any post either from manual or doc
//todo update the action field
Route::post('/admin/class-list/store', [classManagerController::class,'store'])->name('class-list.store');


//student list
Route::get('/admin/student-list',[adminController::class,'showStudentList'])->name('student-list');
Route::get('/admin/student-list/add-manualy',[studentManagerController::class,'manual'])->name('add-student-manualy');
Route::get('/admin/student-list/add-document',[studentManagerController::class,'document'])->name('add-student-document');
//use this to store any post either from manual or doc
Route::post('/admin/student-list/store', [studentManagerController::class,'store'])->name('student-list.store');


//teacher list
Route::get('/admin/teacher-list',[adminController::class,'showTeacherList'])->name('teacher-list');
Route::get('/admin/teacher-list/{id}', [teacherManagerController::class, 'show'])->name('teachers.show');
Route::get('/admin/teacher-list/add-manualy',[teacherManagerController::class,'manual'])->name('add-teacher-manualy');
Route::get('/admin/teacher-list/add-document',[teacherManagerController::class,'document'])->name('add-teacher-document');
//use this to store any post either from manual or doc
Route::post('/admin/teacher-list/store', [teacherManagerController::class,'store'])->name('teacher-list.store');


//parent list
Route::get('/admin/parent-list',[adminController::class,'getParentList'])->name('parent-list');
Route::get('/admin/parent-list/add-manualy',[parentManagerController::class, 'manualy'])->name('add-parent-manualy');
Route::get('/admin/parent-list/add-document',[parentManagerController::class, 'document'])->name('add-parent-document');
//use this to store any post either from manual or doc
Route::post('/admin/parent-list/store', [parentManagerController::class, 'store'])->name('parent-list.store');  



//* routing for teacher



//* routing for parent



//* routing for tilawah



//* routing for access

