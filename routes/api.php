<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\WebsiteController;
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

Route::prefix('users')
    ->name('users.')
    ->group(function (){
        Route::post('', [UserController::class, 'create'])->name('create');
    });

Route::prefix('websites')
    ->name('websites.')
    ->group(function () {
        Route::post('', [WebsiteController::class, 'createWebsite'])->name('create');
        Route::post('posts', [WebsiteController::class, 'createPost'])->name('posts.create');
        Route::post('subscriptions', [WebsiteController::class, 'subscribe'])->name('subscriptions.new');
    });
