<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FriendshipController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(PageController::class)->group(function () {
    Route::get('/', 'index')->name('home');

    Route::get('/explore', 'explore')->name('explore');
});

Route::controller(AccountController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/accounts/signup', 'create')
            ->name('accounts.register');

        Route::get('/accounts/login', 'login')
            ->name('accounts.login');

        Route::post('/accounts', 'store')
            ->name('accounts.store');

        Route::post('/accounts/session', 'session')
            ->name('accounts.session');
    });

    Route::get('/{username}', 'show')->name('accounts.show');
});



Route::middleware('auth')->group(function () {
    Route::resource('p', PostController::class);

    Route::post('accounts/logout', [AccountController::class, 'logout'])
        ->name('accounts.logout');

    Route::controller(FriendshipController::class)->group(function () {
        Route::post('/friendships/create/{id}', 'store')
            ->name('friendships.store');

        Route::delete('/friendships/destroy/{id}', 'destroy')
            ->name('friendships.destroy');
    });

    Route::controller(LikeController::class)->group(function () {
        Route::post('/likes/{post}/like', 'store')->name('likes.store');

        Route::delete('/likes/{post}/unlike', 'destroy')->name('likes.destroy');
    });

    Route::controller(CommentController::class)->group(function () {
        Route::post('/comments/{post}/add', 'store')->name('comments.store');

        Route::delete('/comments/{id}/delete', 'destroy')->name('comments.destroy');
    });

    Route::post('/images/upload', [ImageController::class, 'store'])->name('images.store');
});
