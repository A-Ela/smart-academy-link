<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\studentManagerController;
use App\Http\Controllers\parentManagerController;
use App\Http\Controllers\teacherManagerController;
use App\Http\Controllers\classManagerController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\HomeworkController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\PerformanceController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\GradeController;


//* routing for access
// Route for the index page
Route::get('/', function () {
    return view('access-subsystem.index'); // Displays index.blade.php
});

// Route for admin login
Route::get('/admin-login', 
function () {
    return view('access-subsystem.admin-login'); // Displays admin-login.blade.php
});

// Route for student login
Route::get('/student-login', function () {
    return view('access-subsystem.student-login'); // Displays student-login.blade.php
});

// Route for teacher login
Route::get('/teacher-login', function () {
    return view('access-subsystem.teacher-login'); // Displays teacher-login.blade.php
});

// Route for registration
Route::get('/register', function () {
    return view('access-subsystem.register'); // Displays register.blade.php
});

// Route for password reset
Route::get('/reset-password', function () {
    return view('access-subsystem.reset-password'); // Displays reset-password.blade.php
});
use App\Http\Controllers\AuthController;
Route::post('/password/reset', [AuthController::class, 'sendPasswordReset'])->name('password.reset');



//* routing for admin
Route::get('/admin',[adminController::class,'getDashboard'])->name('admin-dashboard');

//select class
Route::get('/admin/class-selector',[adminController::class,'getClassInfo'])->name('class-selector');
Route::post('/admin/class-selector/confirm', [classManagerController::class, 'handleClassSelection'])->name('class-selector.confirm');


//class lists
Route::get('/admin/class-list',[adminController::class,'getClassList'])->name('class-list');
Route::get('/admin/class-list/add-manualy',[classManagerController::class,'manual'])->name('add-class-manualy');
Route::get('/admin/class-list/add-document',[classManagerController::class,'document'])->name('add-class-document');
//use this to store any post either from manual or doc
Route::post('/admin/class-list/store', [classManagerController::class,'store'])->name('class-list.store');
//viewing specifci parent info
Route::get('/admin/class-list/{classID}', [classManagerController::class, 'show'])->name('class.show');


//student list
Route::get('/admin/student-list',[adminController::class,'showStudentList'])->name('student-list');
Route::get('/admin/student-list/add-manualy',[studentManagerController::class,'manual'])->name('add-student-manualy');
Route::get('/admin/student-list/add-document',[studentManagerController::class,'document'])->name('add-student-document');
//use this to store any post either from manual or doc
Route::post('/admin/student-list/store', [studentManagerController::class,'store'])->name('student-list.store');
//viewing specifci teacher info
Route::get('/admin/student-list/{studentID}', [studentManagerController::class, 'show'])->name('students.show');
//searching for student route
Route::get('/students/search', [studentManagerController::class, 'search'])->name('students.search');


//teacher list
Route::get('/admin/teacher-list',[adminController::class,'showTeacherList'])->name('teacher-list');
Route::get('/admin/teacher-list/add-manualy', [teacherManagerController::class, 'manual'])->name('add-teacher-manualy');
Route::get('/admin/teacher-list/add-document',[teacherManagerController::class,'document'])->name('add-teacher-document');
//use this to store any post either from manual or doc
Route::post('/admin/teacher-list/store', [teacherManagerController::class,'store'])->name('teacher-list.store');
//viewing specifci teacher info
Route::get('/admin/teacher-list/{teacherID}', [teacherManagerController::class, 'show'])->name('teachers.show');


//parent list
Route::get('/admin/parent-list',[adminController::class,'getParentList'])->name('parent-list');
Route::get('/admin/parent-list/add-manualy',[parentManagerController::class, 'manual'])->name('add-parent-manualy');
Route::get('/admin/parent-list/add-document',[parentManagerController::class, 'document'])->name('add-parent-document');
//use this to store any post either from manual or doc
Route::post('/admin/parent-list/store', [parentManagerController::class, 'store'])->name('parent-list.store');  
//viewing specifci parent info
Route::get('/admin/parent-list/{parentID}', [parentManagerController::class, 'show'])->name('parents.show');



//* routing for teacher
Route::get('/teacher-dashboard', function () {
    return view('teacher-subsystem.dashboard'); 
});
// Route for student list
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
// Route to show the form for creating homework
Route::get('/homework/create', [HomeworkController::class, 'create'])->name('homework.create');
// Route to store homework (POST method)
Route::post('/homework', [HomeworkController::class, 'store'])->name('homework.store');
// Route to show the form for editing homework
Route::get('/homework/{id}/edit', [HomeworkController::class, 'edit'])->name('homework.edit');
// Route to update homework (PUT method)
Route::put('/homework/{id}', [HomeworkController::class, 'update'])->name('homework.update');
// Route to delete homework (DELETE method)
Route::delete('/homework/{id}', [HomeworkController::class, 'destroy'])->name('homework.destroy');
// Route for the Homework List page
Route::get('/homework', [HomeworkController::class, 'index'])->name('homework.index');
// Route for viewing the list of homework
Route::get('/homework/list', [HomeworkController::class, 'list'])->name('homework.list');
// Routes for events
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
Route::post('/events', [EventController::class, 'store'])->name('events.store');
// Route to show the form for editing an event
Route::get('/events/{id}/edit', [EventController::class, 'edit'])->name('events.edit');
// Route to update an event (PUT method)
Route::put('/events/{id}', [EventController::class, 'update'])->name('events.update');
// Route to delete an event (DELETE method)
Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('events.destroy');
// Route for displaying the calendar page
Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar.index');
// Route for fetching events as JSON
Route::get('/calendar-events', [EventController::class, 'fetchEvents'])->name('calendar.events');
// Routes for progress and progress pages
Route::get('/progress/performance', [ProgressController::class, 'performance'])->name('progress.performance');
Route::get('/progress/academic', [ProgressController::class, 'academic'])->name('progress.academic');
Route::get('/progress/diniyyah', [ProgressController::class, 'diniyyah'])->name('progress.diniyyah');
Route::get('/progress/tarbiah', [ProgressController::class, 'tarbiah'])->name('progress.tarbiah');
// Routes for performance management
Route::get('/performance', [PerformanceController::class, 'index'])->name('performance.index'); // View all performances
Route::get('/performance/create', [PerformanceController::class, 'create'])->name('performance.create'); // Show form to create a new performance
Route::post('/performance', [PerformanceController::class, 'store'])->name('performance.store'); // Store a new performance
Route::get('/performance/{id}/edit', [PerformanceController::class, 'edit'])->name('performance.edit'); // Show form to edit performance
Route::put('/performance/{id}', [PerformanceController::class, 'update'])->name('performance.update'); // Update an existing performance
Route::delete('/performance/{id}', [PerformanceController::class, 'destroy'])->name('performance.destroy'); // Delete a performance
// Route for grading
Route::get('/grades', [GradeController::class, 'index'])->name('grades.index');
Route::post('/grades', [GradeController::class, 'store'])->name('grades.store');
// Academic Progress
Route::get('/academic-progress', [GradeController::class, 'academicProgress'])->name('academic.progress');
// Diniyyah Progress
Route::get('/diniyyah-progress', [GradeController::class, 'diniyyahProgress'])->name('diniyyah.progress');
// Tarbiah Progress
Route::get('/tarbiah-progress', [GradeController::class, 'tarbiahProgress'])->name('tarbiah.progress');
// Form of grading
Route::get('/grades/{studentId}/create', [GradeController::class, 'create'])->name('grades.create');
// Store grades and feedback
Route::post('/grades/{studentId}', [GradeController::class, 'store'])->name('grades.store');
// Routes for grading specific student
Route::get('/grading/{student_id}', [GradeController::class, 'show'])->name('grading.show');
Route::post('/grading/{student_id}', [GradeController::class, 'store'])->name('grading.store');
// New Routes for Academic, Diniyyah, and Tarbiah Grading
Route::get('/academic/{student_id}', [GradeController::class, 'academic'])->name('academic.grade');
Route::get('/diniyyah/{student_id}', [GradeController::class, 'diniyyah'])->name('diniyyah.grade');
Route::get('/tarbiah/{student_id}', [GradeController::class, 'tarbiah'])->name('tarbiah.grade');
Route::post('/academic/{student_id}', [GradeController::class, 'storeAcademic'])->name('academic.store');
Route::post('/diniyyah/{student_id}', [GradeController::class, 'storeDiniyyah'])->name('diniyyah.store');
Route::post('/tarbiah/{student_id}', [GradeController::class, 'storeTarbiah'])->name('tarbiah.store');



//* routing for parent



//* routing for tilawah


