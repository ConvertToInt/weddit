<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\SubwedditController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FollowsController;
use App\Http\Controllers\CommentController;

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

Route::get('/', function() {
    return view('home');
});

Route::get('/w/create', [SubwedditController::class, 'create']);
Route::post('/w', [SubwedditController::class, 'store']);
Route::get('/w/{subweddit}', [SubwedditController::class, 'show']);
Route::get('/w/{subweddit}/logo', [SubwedditController::class, 'logo']);
Route::delete('/w/{subweddit}', [SubwedditController::class, 'delete']);

Route::post('/w/{subweddit}', [PostController::class, 'store']);
Route::get('/w/{subweddit}/submit', [PostController::class, 'create']);
Route::post('/w/{subweddit}/toggleFollow', [FollowsController::class, 'store']); // :name means you dont have to bind the subweddit
Route::get('/w/{subweddit}/comments/{id}/{title}/edit', [PostController::class, 'edit']); 
Route::get('/w/{subweddit}/comments/{id}/{title}', [PostController::class, 'show']); // when taking in id (which is post id) here you could pick it up as Post id or smth, to collect the object, the subweddit uses name so you cannot (worth changing)
Route::get('/w/{subweddit}/{id}/{title}/thumbnail', [PostController::class, 'thumbnail']);
Route::put('/w/{subweddit}/comments/{id}/{title}', [PostController::class, 'update']); //id is the post id.. bit ambiguous, could be the comment id
Route::delete('/w/{subweddit}/comments/{id}/{title}', [PostController::class, 'destroy']);

Route::post('/w/{subweddit}/{id}/{title}/comment', [CommentController::class, 'store']);
Route::post('/w/{subweddit}/{id}/{title}/reply', [CommentController::class, 'reply']);
Route::delete('/w/{subweddit}/{id}/{title}/{comment}/delete', [CommentController::class, 'delete']);


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
