<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    LoginCredentialController,
    ReportController,
    LibraryController,
    MailSendController,
};

Route::get("/", [LoginCredentialController::class, "create"])->name("admin.login_credential.create");

Route::post('/store', [LoginCredentialController::class, 'store'])->name('admin.login_credential.store');

Route::middleware(['auth.admin'])->group(function () {
    Route::get('/report/access', [ReportController::class, 'accessReport'])->name('admin.report.access');
    Route::get('/report/user', [ReportController::class, 'userReport'])->name('admin.report.user');

    Route::prefix('/library')->group(function () {
        Route::get('/create', [LibraryController::class, 'create'])->name('admin.library.create');
    });

    Route::prefix('/mail_send')->group(function () {
        Route::get('/create', [MailSendController::class, 'create'])->name('admin.mail_send.create');
        Route::post('/store', [MailSendController::class, 'store'])->name('admin.mail_send.store');
        Route::get('/complete', [MailSendController::class, 'complete'])->name('admin.mail_send.complete');
        Route::get('/edit', [MailSendController::class, 'edit'])->name('admin.mail_send.edit');
        Route::put('/update', [MailSendController::class, 'update'])->name('admin.mail_send.update');
    });
});
Route::prefix('/library')->group(function () {
    Route::post('/calc-count', [LibraryController::class, 'calcCount'])->name('admin.library.calc_count');
    Route::post('/store', [LibraryController::class, 'store'])->name('admin.library.store');
});