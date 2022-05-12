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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//list of project
Route::get('project', [App\Http\Controllers\ProjectController::class, 'index'])->name('project.index');

//add proj (get)
Route::get('project/create', [App\Http\Controllers\ProjectController::class, 'create'])->name('project.create');
//add proj (post)
Route::post('project/store', [App\Http\Controllers\ProjectController::class, 'store'])->name('project.store');

//edit proj (get)
Route::get('project/{id}/edit', [App\Http\Controllers\ProjectController::class, 'edit'])->name('project.edit');
//edit proj (put)
Route::put('project/{id}/update', [App\Http\Controllers\ProjectController::class, 'update'])->name('project.update');

//show proj
Route::get('project/{id}/show', [App\Http\Controllers\ProjectController::class, 'show'])->name('project.show');

//del proj
Route::delete('project/{id}/destroy', [App\Http\Controllers\ProjectController::class, 'destroy'])->name('project.destroy');

//list of req
Route::get('req/{pid}', [App\Http\Controllers\ReqController::class, 'index'])->name('req.req_index');

//add req (get)
Route::get('req/{pid}/create', [App\Http\Controllers\ReqController::class, 'create'])->name('req.req_create');
//add req (post)
Route::post('req/store', [App\Http\Controllers\ReqController::class, 'store'])->name('req.store');

//edit req (get)
Route::get('req/{id}/edit', [App\Http\Controllers\ReqController::class, 'edit'])->name('req.req_edit');
//edit req (put)
Route::put('req/{id}/update', [App\Http\Controllers\ReqController::class, 'update'])->name('req.update');

//show req
//Route::get('req/{id}/show', [App\Http\Controllers\ProjectController::class, 'show'])->name('project.show');

//del req
Route::delete('req/{pid}/{id}/destroy', [App\Http\Controllers\ReqController::class, 'destroy'])->name('req.destroy');

