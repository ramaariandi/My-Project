<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Models\Kelas;
use App\Models\User;

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


Route::get('/testing', function () {
    $arr['test'] = '3';
    // $id = $arr['test'];
    // return view('kelas/kelas-buat-materi', ['id' =>  $arr['test']]);
    return redirect()->route('kelas.create.topic', '3');
});


// Authenticated Routes

Route::get('/', [KelasController::class, 'index'])->name('home');
Route::get('/kelas/{$id}', [KelasController::class, 'show'])->middleware('auth')->name('kelas.show');
Route::get('/kelas/{$id}/topic', [KelasController::class, 'showTopic'])->middleware('auth')->name('kelas.show.topic');
Route::get('/kelas/{$id}/video', [KelasController::class, 'showVideo'])->middleware('auth')->name('kelas.show.video');
Route::get('/kelas/{$id}/kuis', [KelasController::class, 'showKuis'])->middleware('auth')->name('kelas.show.kuis');
Route::get('/kelas-buat', [KelasController::class, 'create'])->middleware('auth')->name('kelas.create');
Route::post('/kelas-buat', [KelasController::class, 'store'])->middleware('auth')->name('kelas.store');
Route::get('/kelas-buat/topic', [KelasController::class, 'createTopic'])->middleware('auth')->name('kelas.create.topic');
Route::get('/kelas-buat/video', [KelasController::class, 'createVideo'])->middleware('auth')->name('kelas.create.video');
Route::get('/kelas-buat/kuis', [KelasController::class, 'createKuis'])->middleware('auth')->name('kelas.create.kuis');
Route::get('/kelas-buat/jenis-kuis', [KelasController::class, 'createJenisKuis'])->middleware('auth')->name('kelas.create.jenis.kuis');
Route::get('/kelas-buat/kuis-essay', [KelasController::class, 'createEssayKuis'])->middleware('auth')->name('kelas.create.essay.kuis');
Route::get('/kelas-buat/kuis-pilgan', [KelasController::class, 'createPilganKuis'])->middleware('auth')->name('kelas.create.pilgan.kuis');
Route::post('/kelas-buat/jenis-kuis', [KelasController::class, 'storeJenisKuis'])->middleware('auth')->name('kelas.store.jenis.kuis');
Route::post('/kelas-buat/file', [KelasController::class, 'storeFile'])->middleware('auth')->name('kelas.store.file');


// Public Routes
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('/auth', [AuthController::class, 'authCreate'])->name('auth');
Route::get('/register', [AuthController::class, 'registerCreate'])->name('register.create');
Route::get('/login', [AuthController::class, 'loginCreate'])->name('login.create');
Route::get('/success', [AuthController::class, 'successCreate'])->name('success.create');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/courses/my-course', [UserController::class, 'myCourse'])->name('myCourse');
Route::get('/courses/course-content/{id}', [UserController::class, 'viewCourse'])->name('contentCourse');
Route::get('/courses/input-key-course/{id}', [UserController::class, 'inputKey'])->name('inputKey');
Route::post('/courses/enroll-course', [UserController::class, 'enrollCourse'])->name('enrollCourse');


Route::get('/list-review', [ReviewController::class, 'index'])->name('listReview');
Route::get('/create-review/{id}', [ReviewController::class, 'create'])->name('createReview');
Route::post('/submit-review', [ReviewController::class, 'store'])->name('submitReview');
Route::get('/review/course/{id}', [ReviewController::class, 'show'])->name('reviewById');

Route::get('/courses', [CourseController::class, 'index'])->name('courses');
Route::get('/courses/create-course', [CourseController::class, 'create'])->name('createCourse');
Route::post('/courses/submit-course', [CourseController::class, 'store'])->name('submitCourse');
Route::get('/courses/home-course', [CourseController::class, 'homeCourse'])->name('homeCourse');
Route::get('/courses/view-course', [CourseController::class, 'viewCourse'])->name('viewCourse');
