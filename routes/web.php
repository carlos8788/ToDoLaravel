<?php

use App\Http\Controllers\TodosController;
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
    return view('pages.home');
});

// Route::get('/app', function () {
//     return view('app');
// });

Route::get('/todos', [TodosController::class, 'index'])->name('todos');
Route::get('/todos/{id}/edit', [TodosController::class, 'edit'])->name('todos-edit');
Route::post('/todos', [TodosController::class, 'store'])->name('todos');
Route::patch('/todos/{id}', [TodosController::class, 'update'])->name('todos-update');
Route::delete('/todos/{id}', [TodosController::class, 'delete'])->name('todos-delete');