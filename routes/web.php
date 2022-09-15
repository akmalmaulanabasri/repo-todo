<?php

use App\Http\Controllers\CatatanController;
use App\Http\Controllers\DashboardContoller;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\ToDoController;
use App\Http\Controllers\TugasController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [DashboardContoller::class, 'index'])->name('home');
Route::get('/dashboard', [DashboardContoller::class, 'index'])->name('dashboard');

Route::get('/pelajaran', [MapelController::class, 'index'])->name('jadwal-pelajaran');
Route::get('/pelajaran/tambah', [MapelController::class, 'add'])->name('tambah-pelajaran');
Route::post('/pelajaran/tambah', [MapelController::class, 'store'])->name('buat-pelajaran');
Route::get('/pelajaran/edit/{id}', [MapelController::class, 'edit'])->name('edit-pelajaran');
Route::post('/pelajaran/update/{id}', [MapelController::class, 'update'])->name('update-pelajaran');
Route::get('/pelajaran/delete/{id}', [MapelController::class, 'delete'])->name('delete-pelajaran');


Route::get('/tugas', [TugasController::class, 'index'])->name('daftar-tugas');
Route::get('/tugas/tambah', [TugasController::class, 'add'])->name('tambah-tugas');
Route::post('/tugas/tambah', [TugasController::class, 'store'])->name('buat-tugas');
Route::get('/tugas/edit/{id}', [TugasController::class, 'edit'])->name('edit-tugas');
Route::post('/tugas/update/{id}', [TugasController::class, 'update'])->name('update-tugas');
Route::get('/tugas/delete/{id}', [TugasController::class, 'delete'])->name('delete-tugas');

Route::get('/to-do', [ToDoController::class, 'index'])->name('to-do');
Route::get('/to-do/add', [ToDoController::class, 'add'])->name('add-to-do');
Route::post('/to-do/add', [ToDoController::class, 'post'])->name('post-to-do');
Route::get('/to-do/delete/{id}', [ToDoController::class, 'delete'])->name('delete-to-do');
Route::get('/to-do/edit/{id}', [ToDoController::class, 'edit'])->name('edit-to-do');
Route::post('/to-do/update/{id}', [ToDoController::class, 'update'])->name('update-to-do');