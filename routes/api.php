<?php

use App\Http\Controllers\ConfigSiteController;
use App\Http\Controllers\QuotationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SiteController;

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



Route::post('login', [RegisterController::class, 'login'])->name('login');
Route::resource('config-site', ConfigSiteController::class);
Route::get('generate-pdf-quotation/{id}', [QuotationController::class, 'generatePdfQuotation']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('update-photo-configuration', [ConfigSiteController::class, 'updatePhotoConfiguration']);
    Route::resource('user', UserController::class);
    Route::resource('sites', SiteController::class);
    Route::post('cp', [SiteController::class, 'cp']);
});
