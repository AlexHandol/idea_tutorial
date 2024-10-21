<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\PageNavigationController;
use App\Http\Controllers\UserController;
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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Route::middleware(['auth'])->group(function () {
//     Route::post('/ideas', [IdeaController::class, 'store'])->name('ideas.store');
//     Route::get('/ideas/view/{idea}', [IdeaController::class, 'show'])->name('ideas.show')->withoutMiddleware(['auth']);
//     Route::get('/ideas/edit/{idea}', [IdeaController::class, 'edit'])->name('ideas.edit');
//     Route::put('/ideas/view/{idea}', [IdeaController::class, 'update'])->name('ideas.update');
//     Route::delete('/ideas/{idea}', [IdeaController::class, 'destroy'])->name('ideas.destroy');
//     Route::post('/ideas/comments/{idea}', [CommentController::class, 'store'])->name('ideas.comments.store');
// });

Route::resource('ideas', IdeaController::class)->except(['index', 'create', 'show'])->middleware('auth');

Route::resource('ideas', IdeaController::class)->only(['show']);

Route::resource('ideas.comments', CommentController::class)->only(['store']);

Route::resource('users', UserController::class)->only(['show', 'edit', 'update'])->middleware('auth');

Route::get('profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');

// PAGE NAVIGATIONS
Route::get('/terms', [PageNavigationController::class, 'termsNav']);
Route::get('/explore', [PageNavigationController::class, 'exploreNav']);
