<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    LoginCredentialController,
    ReportController
};
use SebastianBergmann\CodeCoverage\Report\Xml\Report;

Route::get("/", [LoginCredentialController::class, "create"])->name("admin.login_credential.create");

Route::post('/store', [LoginCredentialController::class, 'store'])->name('admin.login_credential.store');

Route::middleware(['auth.user'])->group(function () {
    Route::get('/report/access', [ReportController::class, 'accessReport'])->name('admin.report.access');
    Route::get('/report/user', [ReportController::class, 'userReport'])->name('admin.report.user');
});