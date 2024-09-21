<?php
use App\Http\Controllers\Admin\AdminAccountController;
use App\Http\Controllers\Admin\AdminCommentsController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminTraderController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ComunityController;
use App\Http\Controllers\Admin\PosterController;
use App\Http\Controllers\AdminBannerController;
use App\Http\Controllers\Client\JobsRemovePostController;
use App\Http\Controllers\RequestController;
use Illuminate\Support\Facades\Route;

Route::get('/themtintucmoi', [\App\Http\Controllers\Admin\NewsController::class, 'store2']);

// Admin
Route::middleware('check.role')->group(function () {

    // messenger
    Route::get('/admin-messengers', [\App\Http\Controllers\Admin\MessengerController::class, 'index']);
    Route::get('/admin-messengers/{id}', [\App\Http\Controllers\Admin\MessengerController::class, 'show']);
    Route::put('/admin-messengers/{id}', [\App\Http\Controllers\Admin\MessengerController::class, 'update']);

    // Request Remove Post
    Route::get('/request-remove-post', [\App\Http\Controllers\Client\JobsRemovePostController::class, 'index'])->name('request.remove.post.index');
    Route::put('/request-remove-post/{id}', [JobsRemovePostController::class, 'update'])->name('request.remove.post.update');

    // reports
    Route::get('/admin-reports', [AdminController::class, 'index']);
    Route::get('/admin-reports/create', [AdminController::class, 'create']);
    Route::post('/admin-reports', [AdminController::class, 'store']);
    Route::get('/admin-reports/{id}', [AdminController::class, 'show']);
    Route::delete('/admin-reports/{id}', [AdminController::class, 'destroy']);
    Route::put('/admin-reports/{id}', [AdminController::class, 'update']);
    Route::get('delete-comments/{id}', [AdminController::class, 'delete']);

    // ads
    Route::get('/ads', [\App\Http\Controllers\Admin\AdsController::class, 'index'])->name('ads.index');
    Route::get('/ads/{id}/edit', [\App\Http\Controllers\Admin\AdsController::class, 'edit'])->name('ads.edit');
    Route::put('/ads/{id}', [\App\Http\Controllers\Admin\AdsController::class, 'update'])->name('ads.update');

    //categories
    Route::get('/admin-categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/admin-categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/admin-categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/admin-categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/admin-categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/admin-categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    // traders
    Route::get('/admin-traders', [AdminTraderController::class, 'index'])->name('admin.traders.index');
    Route::get('/admin-traders/create', [AdminTraderController::class, 'create'])->name('admin.traders.create');
    Route::post('/admin-traders', [AdminTraderController::class, 'store']);
    Route::get('/admin-traders/{id}', [AdminTraderController::class, 'show']);
    Route::delete('/admin-traders/{id}', [AdminTraderController::class, 'destroy']);
    Route::put('/admin-traders/{id}', [AdminTraderController::class, 'update']);

    // Request
    Route::get('/admin-requests', [RequestController::class, 'index']);
    Route::delete('/admin-requests/{id}', [RequestController::class, 'destroy']);

    // comments
    Route::get('/admin-comments', [AdminCommentsController::class, 'index']);

    // communities
    Route::get('/admin-communities', [ComunityController::class, 'index'])->name('admin.communities.index');
    Route::get('/admin-communities/create', [ComunityController::class, 'create'])->name('admin.communities.create');
    Route::post('/admin-communities', [ComunityController::class, 'store'])->name('admin.communities.store');
    Route::get('/admin-communities/{id}/edit', [ComunityController::class, 'edit'])->name('admin.communities.edit');
    Route::put('/admin-communities/{id}', [ComunityController::class, 'update'])->name('admin.communities.update');
    Route::delete('/admin-communities/{id}', [ComunityController::class, 'destroy'])->name('admin.communities.destroy');

    // accounts
    Route::get('/admin-accounts', [AdminAccountController::class, 'index'])->name('admin.accounts.index');
    Route::get('/admin-accounts/create', [AdminAccountController::class, 'create'])->name('admin.accounts.create');
    Route::post('/admin-accounts', [AdminAccountController::class, 'store']);
    Route::put('/admin-accounts/update/{id}', [AdminAccountController::class, 'update']);

    // banners
    Route::get('/admin-banners', [AdminBannerController::class, 'index']);
    Route::get('/admin-banners/create', [AdminBannerController::class, 'create']);
    Route::post('/admin-banners', [AdminBannerController::class, 'store']);
    Route::get('/admin-banners/{id}/edit', [AdminBannerController::class, 'edit']);
    Route::put('/admin-banners/{id}', [AdminBannerController::class, 'update']);
    Route::delete('/admin-banners/{id}', [AdminBannerController::class, 'destroy']);

    // Posters
    Route::get('/admin-posters', [PosterController::class, 'index']);
    Route::get('/admin-posters/{id}/edit', [PosterController::class, 'edit']);
    Route::put('/admin-posters/{id}', [PosterController::class, 'update']);

    // news
    Route::get('/admin-news', [\App\Http\Controllers\Admin\NewsController::class, 'index'])->name('admin-news.index');
    Route::post('/admin-news', [\App\Http\Controllers\Admin\NewsController::class, 'store'])->name('admin-news.store');
    Route::post('/admin-news2', [\App\Http\Controllers\Admin\NewsController::class, 'store2'])->name('admin-news.store2');
    Route::delete('/admin-news/{id}', [\App\Http\Controllers\admin\NewsController::class, 'delete'])->name('admin-news.delete');
    Route::get('/admin-news/create', [\App\Http\Controllers\Admin\NewsController::class, 'create'])->name('admin-news.create');
    Route::get('/admin-news/create2', [\App\Http\Controllers\Admin\NewsController::class, 'create2'])->name('admin-news.create2');
    Route::post('/upload-image', [\App\Http\Controllers\Admin\NewsController::class, 'uploadImage'])->name('upload-image');
    Route::get('/admin-news/{id}/edit', [\App\Http\Controllers\Admin\NewsController::class, 'edit'])->name('admin-news.edit');
    Route::put('/admin-news/{id}', [\App\Http\Controllers\Admin\NewsController::class, 'update'])->name('admin-news.update');

    // contracts
    Route::get('/admin-contracts', [\App\Http\Controllers\Admin\ContractController::class, 'index'])->name('admin-contracts.index');
    Route::get('/admin-contracts/{id}/edit', [\App\Http\Controllers\Admin\ContractController::class, 'edit']);
    Route::put('/admin-contracts/{id}', [\App\Http\Controllers\Admin\ContractController::class, 'update']);
    Route::delete('/admin-contracts/{id}', [\App\Http\Controllers\Admin\ContractController::class, 'destroy']);
});
