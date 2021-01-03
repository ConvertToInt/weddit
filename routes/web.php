<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\SubwedditController;
use App\Http\Controllers\PostController;

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

Route::get('/', [SubwedditController::class, 'index']);
Route::get('/w/create', [SubwedditController::class, 'create']);
Route::post('/w', [SubwedditController::class, 'store']);
Route::get('/w/{subweddit}', [SubwedditController::class, 'show']);
Route::delete('/w/{subweddit}', [SubwedditController::class, 'delete']);

Route::post('/w/{subweddit}', [PostController::class, 'store']);
Route::get('/w/{subweddit}/comments/{id}/{title}/edit', [PostController::class, 'edit']);
Route::get('/w/{subweddit}/comments/{id}/{title}', [PostController::class, 'show']);
Route::put('/w/{subweddit}/comments/{id}/{title}', [PostController::class, 'update']);
Route::delete('/w/{subweddit}/comments/{id}/{title}', [PostController::class, 'destroy']);


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
