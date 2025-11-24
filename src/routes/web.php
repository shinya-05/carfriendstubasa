<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\AssessmentController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CarController as AdminCarController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\InquiryController as AdminInquiryController;
use App\Http\Controllers\Admin\AssessmentController as AdminAssessmentController;

/*
|--------------------------------------------------------------------------
| フロント（公開）側
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

/* 在庫車両 */
Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
Route::get('/cars/search', [CarController::class, 'search'])->name('cars.search');
Route::get('/cars/{car}', [CarController::class, 'show'])->name('cars.show');

/* お知らせ */
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');

/* お問い合わせ */
Route::get('/contact', [InquiryController::class, 'showForm'])->name('contact.form');
Route::post('/contact/submit', [InquiryController::class, 'submit'])->name('contact.submit');

/* 買取査定（任意） */
Route::get('/assessment', [AssessmentController::class, 'showForm'])->name('assessment.form');
Route::post('/assessment/submit', [AssessmentController::class, 'submit'])->name('assessment.submit');


/*
|--------------------------------------------------------------------------
| 管理画面（Admin）
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {

    // ダッシュボード
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    /* 在庫車両 */
    Route::get('/cars', [AdminCarController::class, 'index'])->name('cars.index');
    Route::get('/cars/create', [AdminCarController::class, 'create'])->name('cars.create');
    Route::post('/cars', [AdminCarController::class, 'store'])->name('cars.store');
    Route::get('/cars/{car}/edit', [AdminCarController::class, 'edit'])->name('cars.edit');
    Route::put('/cars/{car}', [AdminCarController::class, 'update'])->name('cars.update');
    Route::delete('/cars/{car}', [AdminCarController::class, 'destroy'])->name('cars.destroy');

    /* お知らせ */
    Route::get('/news', [AdminNewsController::class, 'index'])->name('news.index');
    Route::get('/news/create', [AdminNewsController::class, 'create'])->name('news.create');
    Route::post('/news', [AdminNewsController::class, 'store'])->name('news.store');
    Route::get('/news/{news}/edit', [AdminNewsController::class, 'edit'])->name('news.edit');
    Route::put('/news/{news}', [AdminNewsController::class, 'update'])->name('news.update');
    Route::delete('/news/{news}', [AdminNewsController::class, 'destroy'])->name('news.destroy');

    /* 問い合わせ */
    Route::get('/inquiries', [AdminInquiryController::class, 'index'])->name('inquiries.index');
    Route::get('/inquiries/{id}', [AdminInquiryController::class, 'show'])->name('inquiries.show');
    Route::put('/inquiries/{id}/status', [AdminInquiryController::class, 'updateStatus'])->name('inquiries.status');

    /* 査定（任意） */
    Route::get('/assessments', [AdminAssessmentController::class, 'index'])->name('assessments.index');
    Route::get('/assessments/{id}', [AdminAssessmentController::class, 'show'])->name('assessments.show');
    Route::put('/assessments/{id}/status', [AdminAssessmentController::class, 'updateStatus'])->name('assessments.status');
});
