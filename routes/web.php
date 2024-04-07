<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    LoginCredentialController
};

Route::get('/', function () {
    return to_route('login_credential.create');
});

Route::prefix('login/')->group(function () {
    Route::get('/', [LoginCredentialController::class, 'create'])->name('login_credential.create');
    Route::post('/', [LoginCredentialController::class, 'store'])->name('login_credential.store');        
});

Route::middleware(['auth.user'])->group(function () {
        Route::get('/logout', [LoginCredentialController::class, 'logout'])->name('login_credential.logout');
});