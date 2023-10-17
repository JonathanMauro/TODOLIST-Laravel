<?php

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

use App\Http\Controllers\ListController;

Route::get('/', [ListController::class, 'index'])->name('index');



Route::post('/create', [ListController::class, 'create'])->name('create');
Route::get('/tasks/{task_id}', [ListController::class, 'delete'])->name('delete');

Route::post('/markAsCompleted/{task_id}', [ListController::class, 'markAsCompleted'])->name('markAsCompleted');
Route::get('/showtask/{task_id}', [ListController::class, 'showTask'])->name('showtask');