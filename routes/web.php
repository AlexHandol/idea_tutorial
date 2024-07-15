<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\PageNavigationController;
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

Route::middleware(['auth'])->group(function () {
    Route::post('/ideas', [IdeaController::class, 'store'])->name('ideas.store');
    Route::get('/ideas/view/{idea}', [IdeaController::class, 'show'])->name('ideas.view.show')->withoutMiddleware(['auth']);
    Route::get('/ideas/view/edit/{idea}', [IdeaController::class, 'edit'])->name('ideas.view.edit');
    Route::put('/ideas/view/{idea}', [IdeaController::class, 'update'])->name('ideas.view.update');
    Route::delete('/ideas/{idea}', [IdeaController::class, 'destroy'])->name('ideas.destroy');
    Route::post('/ideas/comments/{idea}', [CommentController::class, 'store'])->name('ideas.comments.store');
});

// PAGE NAVIGATIONS
Route::get('/terms', [PageNavigationController::class, 'termsNav']);
Route::get('/explore', [PageNavigationController::class, 'exploreNav']);
