<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    LibraryController,
    LibraryHistoryController,
    LoginCredentialController
};

Route::get('/', function () {
    return to_route('login_credential.create');
});

Route::prefix('/login')->group(function () {
    Route::get('/', [LoginCredentialController::class, 'create'])->name('login_credential.create');
    Route::post('/', [LoginCredentialController::class, 'store'])->name('login_credential.store');
});

Route::middleware(['auth.user'])->group(function () {

    Route::get('/logout', [LoginCredentialController::class, 'logout'])->name('login_credential.logout');     

    Route::prefix('/library')->group(function () {
        Route::get('/index', [LibraryController::class, 'index'])->name('library.index');
        Route::get('/{library}', [LibraryController::class, 'show'])->name('library.show');
    });

    Route::prefix('/library/history')->group(function () {
        Route::get('/index', [LibraryController::class, 'index'])->name('library_history.index');
        Route::get('/store/{library}', [LibraryHistoryController::class, 'store'])->name('library_history.store');
        Route::get('/book_return/{library}', [LibraryHistoryController::class, 'bookReturn'])->name('library_history.book_return');
        Route::get('/complete/{library_history}', [LibraryHistoryController::class,'complete'])->name('library_history.complete');
    });
});