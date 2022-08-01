<?php

use App\Http\Controllers\SchoolsController;
use App\Http\Controllers\StudentsController;
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

Route::get('/', function () {
    return redirect(route('schools.index'));
});

Route::group(['prefix'=> 'schools', 'as'=> 'schools.'], function(){
    Route::get('/', [SchoolsController::class, 'index'])->name('index');
    Route::get('/create', [SchoolsController::class, 'create'])->name('create');
    Route::post('/store', [SchoolsController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [SchoolsController::class, 'edit'])->name('edit');
    Route::put('/update', [SchoolsController::class, 'update'])->name('update');
    Route::delete('/delete', [SchoolsController::class, 'delete'])->name('delete');
});

Route::group(['prefix'=> 'students', 'as'=> 'students.'], function(){
    Route::get('/', [StudentsController::class, 'index'])->name('index');
    Route::get('/create', [StudentsController::class, 'create'])->name('create');
    Route::post('/store', [StudentsController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [StudentsController::class, 'edit'])->name('edit');
    Route::put('/update', [StudentsController::class, 'update'])->name('update');
    Route::delete('/delete', [StudentsController::class, 'delete'])->name('delete');
});
