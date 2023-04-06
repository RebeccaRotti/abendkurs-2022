<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

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
    return view('auth.login');
});


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
    Route::post('addStory', [PageController::class, 'addStory'])->name('addStory');
    Route::get('/showStory/{storyId}', [PageController::class, 'showStory'])->name('showStory');
    Route::post('editStory', [PageController::class, 'editStory'])->name('editStory');
    Route::get('/showDeleteStory/{storyId}', [PageController::class, 'showDeleteStory'])->name('showDeleteStory');
    Route::post('deleteStory', [PageController::class, 'deleteStory'])->name('deleteStory');
    Route::get('story/{storyId}', [PageController::class, 'story'])->name('story');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
