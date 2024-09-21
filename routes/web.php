<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'admin'])->group(function() {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin/book/add', [AdminController::class, 'addBook'])->name('admin.add');
    Route::get('/admin/book/edit/{id}', [AdminController::class, 'editBook'])->name("admin.edit");
    Route::post('/admin/book/update/{id}', [AdminController::class, 'updateBook'])->name("admin.update");
    Route::post('/admin/book/delete/{id}', [AdminController::class, 'deleteBook']);
    Route::get('/admin/student/{id}', [AdminController::class, 'viewStudent']);
});

Route::middleware('auth')->group(function() {
    Route::get('/books', [StudentController::class, 'index'])->name('student.dashboard');
    Route::post('/book/borrow/{id}', [StudentController::class, 'borrowBook']);
    Route::post('/book/return/{id}', [StudentController::class, 'returnBook']);
});
