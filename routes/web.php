<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;

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

Route::get('/', function () {
    return view('auth.login');
})->middleware(['guest']);

Auth::routes();

Auth::routes(['register' => false]);

// One route for clearing caches 

Route::get('/clear', function () {

    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return "Cleared!";
});

// admin route
Route::get('/home', [AdminController::class, 'index'])->middleware(['auth'])->name('admin.admin');

// create course
Route::post('/admin/course', [AdminController::class, 'course'])->middleware(['auth', 'role:Super Admin'])->name('admin.course');

// create student
Route::post('/admin/student', [AdminController::class, 'student'])->middleware(['auth', 'role:Super Admin'])->name('admin.student');


// student route
Route::get('/student', [StudentController::class, 'index'])->middleware(['auth'])->name('student.student');
// register course
Route::get('/registerCourse/{id}', [StudentController::class, 'registerCourse'])->middleware(['auth', 'role:Student'])->name('student.registerCourse');
