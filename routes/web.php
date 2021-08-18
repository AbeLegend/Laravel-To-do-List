<?php

use App\Http\Controllers\TodoController;
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

Route::view('/profile/edit', 'profile.edit')->middleware('auth', 'verified');
Route::view('/profile/password', 'profile.password')->middleware('auth', 'verified');

Route::get('/', [TodoController::class, 'index'])->middleware('auth', 'verified'); // index
Route::get('/home', [TodoController::class, 'index'])->middleware('auth', 'verified'); // index
Route::post('/todo', [TodoController::class, 'store'])->middleware('auth', 'verified'); // store
Route::get('/todo/{todo}/edit', [TodoController::class, 'edit'])->middleware('auth', 'verified'); // edit page
Route::post('/todo/{todo}/completed', [TodoController::class, 'completed'])->middleware('auth', 'verified'); // complete
Route::post('/todo/{todo}/uncompleted', [TodoController::class, 'uncompleted'])->middleware('auth', 'verified'); // uncomplete
Route::put('/todo/{todo}', [TodoController::class, 'update'])->middleware('auth', 'verified'); // update
Route::delete('/todo/{todo}', [TodoController::class, 'destroy'])->middleware('auth', 'verified'); // delete
