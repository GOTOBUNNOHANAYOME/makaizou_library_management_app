<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    LibraryController,
    LibraryHistoryController,
    LoginCredentialController,
    UserController,
    UserAuthenticationController,
};

Route::get('/', function () {
    return to_route('login_credential.create');
});

Route::prefix('/login')->group(function () {
    Route::get('/', [LoginCredentialController::class, 'create'])->name('login_credential.create');
    Route::post('/', [LoginCredentialController::class, 'store'])->name('login_credential.store');
});

Route::prefix('/authentication')->group(function () {
    Route::get('/{authentication_type}', [UserAuthenticationController::class, 'create'])->name('user_authentication.create');
    Route::post('/store', [UserAuthenticationController::class, 'store'])->name('user_authentication.store');
});

Route::prefix('/user')->group(function () {
    Route::get('/create/{authentication_token}', [UserController::class, 'create'])->name('user.create');
    Route::post('/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/password/create', [UserController::class,'createPassword'])->name('user.create_password');
    Route::get('/password/edit/{authentication_token}', [UserController::class, 'editPassword'])->name('user.edit_password');
    Route::post('password/update', [UserController::class, 'updatePassword'])->name('user.update_password');
    Route::get('/complete_reset_password', [UserController::class,'completePasswordReset'])->name('user.complete_reset_password');
    Route::get('/complete', [UserController::class, 'complete'])->name('user.complete');
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