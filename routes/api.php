<?php

use App\Http\Controllers\Client\MidmanController;
use App\Http\Controllers\Client\TraderController;
use App\Http\Controllers\GetApiController;
use App\Http\Controllers\MessengerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/traders-search', [TraderController::class, 'search'])->name('trader.search');
Route::get('/messengers-more', [MessengerController::class, 'loadMore']);
Route::get('/categories', [\App\Http\Controllers\Admin\CategoryController::class, 'getCategories']);
Route::get('/myInfo', [\App\Http\Controllers\Admin\AdminAccountController::class, 'getMyInfo']);
Route::get('/check-pass-midman/{id}', [MidmanController::class, 'checkPass']);
Route::post('/check-pass-midman/{id}' , [MidmanController::class, 'store'], );
Route::get('/messengers/{id}', [MessengerController::class, 'getMessengers']);

Route::put('/ads/{home}', [\App\Http\Controllers\Admin\AdsController::class, 'updateStatus']);

