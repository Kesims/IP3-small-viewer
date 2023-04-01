<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\ValidateAdmin;
use Illuminate\Http\Request;
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

Auth::routes();

Route::get('/rooms', [RoomController::class, 'index'])->name('room.index');
Route::get('/rooms/create', [RoomController::class, 'create'])->name('room.create')->middleware(ValidateAdmin::class);
Route::post('/rooms/store', [RoomController::class, 'store'])->name('room.store')->middleware(ValidateAdmin::class);
Route::get('/rooms/{id}', [RoomController::class, 'show'])->name('room.show');
Route::get('/rooms/{id}/edit', [RoomController::class, 'edit'])->name('room.edit')->middleware(ValidateAdmin::class);
Route::post('/rooms/{id}/update', [RoomController::class, 'update'])->name('room.update')->middleware(ValidateAdmin::class);
Route::post('/rooms/{id}/delete', [RoomController::class, 'destroy'])->name('room.destroy')->middleware(ValidateAdmin::class);


Route::get('/users', [UserController::class, 'index'])->name('user.index');
Route::get('/users/create', [UserController::class, 'create'])->name('user.create')->middleware(ValidateAdmin::class);
Route::post('/users/store', [UserController::class, 'store'])->name('user.store')->middleware(ValidateAdmin::class);
Route::get('/users/{id}', [UserController::class, 'show'])->name('user.show');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('user.edit')->middleware(ValidateAdmin::class);
Route::post('/users/{id}/update', [UserController::class, 'update'])->name('user.update')->middleware(ValidateAdmin::class);
Route::post('/users/{id}/delete', [UserController::class, 'destroy'])->name('user.destroy')->middleware(ValidateAdmin::class);
Route::get('/users/{id}/change-password', [UserController::class, 'changePassword'])->name('user.change-password');
Route::post('/users/{id}/update-password', [UserController::class, 'updatePassword'])->name('user.update-password');
Route::get('/users/{id}/keys', [UserController::class, 'editKeys'])->name('user.keys')->middleware(ValidateAdmin::class);
Route::post('/users/{id}/update-keys', [UserController::class, 'updateKeys'])->name('user.keys.update')->middleware(ValidateAdmin::class);



Route::post('/logout', [LoginController::class, 'logout'])->name('login.logout');
Route::post('/login', [LoginController::class, 'validateLogin'])->name('login.login');
Route::get('/', [LoginController::class, 'login'])->name('login');

