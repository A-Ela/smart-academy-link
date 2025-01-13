<?php
// routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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
use App\Http\Controllers\ParentDashboardController;

//* routing for access
// Route for the index page
Route::get('/', function () {
    return view('access-subsystem.index'); // Displays index.blade.php
});

// Route for admin login
Route::get('/admin-login', function () {
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

// Route for contact school form submission
Route::post('/contact-school', [AuthController::class, 'contactSchool'])->name('contact.school');

// Route for password reset
Route::get('/reset-password', function () {
    return view('access-subsystem.reset-password'); // Displays reset-password.blade.php
});
Route::post('/password/reset', [AuthController::class, 'sendPasswordReset'])->name('password.reset');

// Route for login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Route for logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//* routing for admin
Route::middleware(['auth', 'check.user.role:admin'])->group(function () {
    Route::get('/admin', [adminController::class, 'getDashboard'])->name('admin-dashboard');
    Route::get('/admin/class-selector', [adminController::class, 'getClassInfo'])->name('class-selector');
    Route::post('/admin/class-selector/confirm', [classManagerController::class, 'handleClassSelection'])->name('class-selector.confirm');
    Route::get('/admin/class-list', [adminController::class, 'getClassList'])->name('class-list');
    Route::get('/admin/class-list/add-manualy', [classManagerController::class, 'manual'])->name('add-class-manualy');
    Route::get('/admin/class-list/add-document', [classManagerController::class, 'document'])->name('add-class-document');
    Route::post('/admin/class-list/store', [classManagerController::class, 'store'])->name('class-list.store');
    Route::get('/admin/class-list/{classID}', [classManagerController::class, 'show'])->name('class.show');
    Route::get('/admin/student-list', [adminController::class, 'showStudentList'])->name('student-list');
    Route::get('/admin/student-list/add-manualy', [studentManagerController::class, 'manual'])->name('add-student-manualy');
    Route::get('/admin/student-list/add-document', [studentManagerController::class, 'document'])->name('add-student-document');
    Route::post('/admin/student-list/store', [studentManagerController::class, 'store'])->name('student-list.store');
    Route::get('/admin/student-list/{studentID}', [studentManagerController::class, 'show'])->name('students.show');
    Route::get('/students/search', [studentManagerController::class, 'search'])->name('students.search');
    Route::get('/admin/teacher-list', [adminController::class, 'showTeacherList'])->name('teacher-list');
    Route::get('/admin/teacher-list/add-manualy', [teacherManagerController::class, 'manual'])->name('add-teacher-manualy');
    Route::get('/admin/teacher-list/add-document', [teacherManagerController::class, 'document'])->name('add-teacher-document');
    Route::post('/admin/teacher-list/store', [teacherManagerController::class, 'store'])->name('teacher-list.store');
    Route::get('/admin/teacher-list/{teacherID}', [teacherManagerController::class, 'show'])->name('teachers.show');
    Route::get('/admin/parent-list', [adminController::class, 'getParentList'])->name('parent-list');
    Route::get('/admin/parent-list/add-manualy', [parentManagerController::class, 'manual'])->name('add-parent-manualy');
    Route::get('/admin/parent-list/add-document', [parentManagerController::class, 'document'])->name('add-parent-document');
    Route::post('/admin/parent-list/store', [parentManagerController::class, 'store'])->name('parent-list.store');
    Route::get('/admin/parent-list/{parentID}', [parentManagerController::class, 'show'])->name('parents.show');
});

//* routing for teacher
Route::middleware(['auth', 'check.user.role:teacher'])->group(function () {
    Route::get('/teacher-dashboard', function () {
        return view('teacher-subsystem.dashboard');
    })->name('teacher-dashboard');
    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::get('/homework/create', [HomeworkController::class, 'create'])->name('homework.create');
    Route::post('/homework', [HomeworkController::class, 'store'])->name('homework.store');
    Route::get('/homework/{id}/edit', [HomeworkController::class, 'edit'])->name('homework.edit');
    Route::put('/homework/{id}', [HomeworkController::class, 'update'])->name('homework.update');
    Route::delete('/homework/{id}', [HomeworkController::class, 'destroy'])->name('homework.destroy');
    Route::get('/homework', [HomeworkController::class, 'index'])->name('homework.index');
    Route::get('/homework/list', [HomeworkController::class, 'list'])->name('homework.list');
    Route::get('/events', [EventController::class, 'index'])->name('events.index');
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::get('/events/{id}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/{id}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('events.destroy');
    Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar.index');
    Route::get('/calendar-events', [EventController::class, 'fetchEvents'])->name('calendar.events');
    Route::get('/progress/performance', [ProgressController::class, 'performance'])->name('progress.performance');
    Route::get('/progress/academic', [ProgressController::class, 'academic'])->name('progress.academic');
    Route::get('/progress/diniyyah', [ProgressController::class, 'diniyyah'])->name('progress.diniyyah');
    Route::get('/progress/tarbiah', [ProgressController::class, 'tarbiah'])->name('progress.tarbiah');
    Route::get('/performance', [PerformanceController::class, 'index'])->name('performance.index');
    Route::get('/performance/create', [PerformanceController::class, 'create'])->name('performance.create');
    Route::post('/performance', [PerformanceController::class, 'store'])->name('performance.store');
    Route::get('/performance/{id}/edit', [PerformanceController::class, 'edit'])->name('performance.edit');
    Route::put('/performance/{id}', [PerformanceController::class, 'update'])->name('performance.update');
    Route::delete('/performance/{id}', [PerformanceController::class, 'destroy'])->name('performance.destroy');
    Route::get('/grades', [GradeController::class, 'index'])->name('grades.index');
    Route::post('/grades', [GradeController::class, 'store'])->name('grades.store');
    Route::get('/academic-progress', [GradeController::class, 'academicProgress'])->name('academic.progress');
    Route::get('/diniyyah-progress', [GradeController::class, 'diniyyahProgress'])->name('diniyyah.progress');
    Route::get('/tarbiah-progress', [GradeController::class, 'tarbiahProgress'])->name('tarbiah.progress');
    Route::get('/grades/{studentId}/create', [GradeController::class, 'create'])->name('grades.create');
    Route::post('/grades/{studentId}', [GradeController::class, 'storeGrade'])->name('grades.storeGrade'); // Changed name to avoid conflict
    Route::get('/grading/{student_id}', [GradeController::class, 'show'])->name('grading.show');
    Route::post('/grading/{student_id}', [GradeController::class, 'store'])->name('grading.store');
    Route::get('/academic/{student_id}', [GradeController::class, 'academic'])->name('academic.grade');
    Route::get('/diniyyah/{student_id}', [GradeController::class, 'diniyyah'])->name('diniyyah.grade');
    Route::get('/tarbiah/{student_id}', [GradeController::class, 'tarbiah'])->name('tarbiah.grade');
    Route::post('/academic/{student_id}', [GradeController::class, 'storeAcademic'])->name('academic.store');
    Route::post('/diniyyah/{student_id}', [GradeController::class, 'storeDiniyyah'])->name('diniyyah.store');
    Route::post('/tarbiah/{student_id}', [GradeController::class, 'storeTarbiah'])->name('tarbiah.store');
});

//* routing for parent
//Route::middleware(['auth', 'check.user.role:parent'])->group(function () {
    //add parent routes here

// Parent Dashboard route
Route::get('/parent-dashboard', [ParentDashboardController::class, 'index'])->name('parent-dashboard');

// Route for events page
Route::get('/events', function () {
    return view('parent-subsystem.events');
})->name('events');

// Route for student performance page
Route::get('/student-performance/minah-binti-abu', function () {
    return view('parent-subsystem.studentPerformance', ['studentName' => 'Minah binti Abu']);
})->name('student-performance-minah');

// Route for calendar page
Route::get('/calendar', function () {
    return view('parent-subsystem.calendar');
})->name('calendar');

// Route for class Telegram links
Route::get('/class-telegram-links', function () {
    $classLinks = [
        ['class' => 'Class 1A', 'link' => 'https://t.me/class1Agroup'],
        ['class' => 'Class 1B', 'link' => 'https://t.me/class1Bgroup'],
        ['class' => 'Class 2A', 'link' => 'https://t.me/class2Agroup'],
    ];

    return view('parent-subsystem.classTelegramLinks', ['classLinks' => $classLinks]);
})->name('class-telegram-links');

//* Routes for Academic, Diniyyah, and Tarbiah Progress Pages

// Academic Progress routes
Route::get('/academic/year/{year}', function ($year) {
    return view('parent-subsystem.academic_progress', ['year' => $year]);
})->name('academic-progress');

// Diniyyah Progress routes
Route::get('/diniyyah/year/{year}', function ($year) {
    return view('parent-subsystem.diniyyah_progress', ['year' => $year]);
})->name('diniyyah-progress');

// Tarbiah Progress routes
Route::get('/tarbiah/year/{year}', function ($year) {
    return view('parent-subsystem.tarbiah_progress', ['year' => $year]);
})->name('tarbiah-progress');

// Route for notifications
Route::get('/notifications', function () {
    return view('parent-subsystem.notifications');
})->name('notifications');

//});
//* routing for tilawah


