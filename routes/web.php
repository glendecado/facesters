<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    //from post controller
    $posts = app(PostController::class)->index();
    return view('dashboard', compact('posts'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //for post
    Route::prefix('posts')->group(function () {
        // Route to display all posts
        Route::get('/', [PostController::class, 'index'])->name('posts.index');

        // Route to display the form for creating a new post
        Route::get('/create', [PostController::class, 'create'])->name('posts.create');

        // Route to store a new post in the database
        Route::post('/', [PostController::class, 'store'])->name('posts.store');

        // Route to display a specific post
        Route::get('/{id}', [PostController::class, 'show'])->name('posts.show');

        // Route to display the form for editing a post
        Route::get('/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');

        // Route to update a post in the database
        Route::put('/{id}', [PostController::class, 'update'])->name('posts.update');

        // Route to delete a post from the database
        Route::delete('/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
    });
});

require __DIR__.'/auth.php';
