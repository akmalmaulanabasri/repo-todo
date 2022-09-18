<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ToDoController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\CatatanController;
use App\Http\Controllers\DashboardContoller;

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

Route::get('/', [DashboardContoller::class, 'landing'])->name('home');
Route::get('/dashboard', [DashboardContoller::class, 'index'])->name('dashboard')->middleware('auth');

Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/register', [AuthController::class, 'register'])->name('register')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login-login')->middleware('guest');
Route::post('/register', [AuthController::class, 'registerNew'])->name('register-register')->middleware('guest');

Route::get('/pelajaran', [MapelController::class, 'index'])->name('jadwal-pelajaran')->middleware('auth');
Route::get('/pelajaran/tambah', [MapelController::class, 'add'])->name('tambah-pelajaran')->middleware('auth');
Route::post('/pelajaran/tambah', [MapelController::class, 'store'])->name('buat-pelajaran')->middleware('auth');
Route::get('/pelajaran/edit/{id}', [MapelController::class, 'edit'])->name('edit-pelajaran')->middleware('auth');
Route::post('/pelajaran/update/{id}', [MapelController::class, 'update'])->name('update-pelajaran')->middleware('auth');
Route::get('/pelajaran/delete/{id}', [MapelController::class, 'delete'])->name('delete-pelajaran')->middleware('auth');


Route::get('/tugas', [TugasController::class, 'index'])->name('daftar-tugas')->middleware('auth');
Route::get('/tugas/tambah', [TugasController::class, 'add'])->name('tambah-tugas')->middleware('auth');
Route::post('/tugas/tambah', [TugasController::class, 'store'])->name('buat-tugas')->middleware('auth');
Route::get('/tugas/edit/{id}', [TugasController::class, 'edit'])->name('edit-tugas')->middleware('auth');
Route::post('/tugas/update/{id}', [TugasController::class, 'update'])->name('update-tugas')->middleware('auth');
Route::get('/tugas/delete/{id}', [TugasController::class, 'delete'])->name('delete-tugas')->middleware('auth');
Route::get('/tugas/success/{id}', [TugasController::class, 'success'])->name('tugas-success')->middleware('auth');

Route::get('/to-do', [ToDoController::class, 'index'])->name('to-do')->middleware('auth');
Route::get('/to-do/add', [ToDoController::class, 'add'])->name('add-to-do')->middleware('auth');
Route::post('/to-do/add', [ToDoController::class, 'post'])->name('post-to-do')->middleware('auth');
Route::get('/to-do/delete/{id}', [ToDoController::class, 'delete'])->name('delete-to-do')->middleware('auth');
Route::get('/to-do/edit/{id}', [ToDoController::class, 'edit'])->name('edit-to-do')->middleware('auth');
Route::post('/to-do/update/{id}', [ToDoController::class, 'update'])->name('update-to-do')->middleware('auth');
Route::get('/to-do/success/{id}', [ToDoController::class, 'success'])->name('success-todo')->middleware('auth');