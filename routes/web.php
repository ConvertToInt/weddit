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

Route::get('/', [SubwedditController::class, 'index'])->middleware('can:viewAny,App\Models\Subweddit'); //works
Route::get('/w/create', [SubwedditController::class, 'create'])->middleware('can:create,App\Models\Subweddit'); //works
Route::post('/w', [SubwedditController::class, 'store'])->middleware('can:create,App\Models\Subweddit'); //works
Route::get('/w/{subweddit}', [SubwedditController::class, 'show'])->middleware('can:view,subweddit'); //works
Route::get('/w/{subweddit}/logo', [SubwedditController::class, 'logo'])->middleware('can:view,subweddit'); //works
Route::delete('/w/{subweddit}/delete', [SubwedditController::class, 'delete'])->middleware('can:delete,subweddit'); //works
Route::post('/w/{subweddit}/toggleFollow', [FollowsController::class, 'toggle'])->middleware('can:follow,subweddit'); // :name means you dont have to bind the subweddit

Route::post('/w/{subweddit}', [PostController::class, 'store'])->middleware('can:create,App\Models\Post'); //works
Route::get('/w/{subweddit}/submit', [PostController::class, 'create'])->middleware('can:create,App\Models\Post'); //works
Route::get('/w/{subweddit}/comments/{post}/{slug}/edit', [PostController::class, 'edit'])->middleware('can:update,post'); //works
Route::get('/w/{subweddit}/comments/{post}/{slug}', [PostController::class, 'show'])->middleware('can:view,post'); // works
Route::get('/w/{subweddit}/{post}/{slug}/img', [PostController::class, 'img'])->middleware('can:view,post'); //works
Route::put('/w/{subweddit}/comments/{post}/{slug}', [PostController::class, 'update'])->middleware('can:update,post'); // works
Route::delete('/w/{subweddit}/comments/{post}/{slug}', [PostController::class, 'delete'])->middleware('can:delete,post,subweddit'); //works

Route::post('/w/{subweddit}/{post}/{slug}/comment', [CommentController::class, 'store'])->middleware('can:create,App\Models\Comment'); //works
Route::post('/w/{subweddit}/{post}/{slug}/reply', [CommentController::class, 'reply'])->middleware('can:create,App\Models\Comment'); //works
Route::delete('/w/{subweddit}/{post}/{slug}/{comment}/delete', [CommentController::class, 'delete'])->middleware('can:delete,comment,subweddit'); //works


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
