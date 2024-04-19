<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    LoginCredentialController,
    ReportController,
    LibraryController,
};
use SebastianBergmann\CodeCoverage\Report\Xml\Report;

Route::get("/", [LoginCredentialController::class, "create"])->name("admin.login_credential.create");

Route::post('/store', [LoginCredentialController::class, 'store'])->name('admin.login_credential.store');

Route::middleware(['auth.admin'])->group(function () {
    Route::get('/report/access', [ReportController::class, 'accessReport'])->name('admin.report.access');
    Route::get('/report/user', [ReportController::class, 'userReport'])->name('admin.report.user');

    Route::prefix('/library')->group(function () {
        Route::get('/index', [LibraryController::class, 'index'])->name('admin.library.index');
    });
});
Route::prefix('/library')->group(function () {
    Route::post('/calc-count', [LibraryController::class,'calcCount'])->name('admin.library.calc_count');
    Route::post('/store', [LibraryController::class, 'store'])->name('admin.library.store');
});