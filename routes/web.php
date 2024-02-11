<?php

use App\Http\Controllers\{CommentController, PostController, DashboardController, FeedController, FollowerController, PostLikeController, UserController};
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/feed', FeedController::class)->name('feed');

    Route::controller(PostController::class)->group(function () {
        Route::get('/posts/{post}', 'show')->name('posts.show');
        Route::post('/posts', 'store')->name('posts.store');
        Route::delete('/posts/{post}', 'destroy')->name('posts.delete');
        Route::get('/posts/{post}/edit', 'edit')->name('posts.edit');
        Route::put('/posts/{post}', 'update')->name('posts.update');
        Route::delete('/posts/{post}/{image}', 'destroyPhoto')->name('media.delete');
    });

    Route::controller(CommentController::class)->group(function () {
        Route::post('/posts/{post}/comments', 'store')->name('posts.comments.store');
        Route::delete('/comments/{comment}', 'destroy')->name('comments.delete');
    });

    Route::post('/users/{user}/follow', [FollowerController::class, 'follow'])->name('users.follow');
    Route::delete('/users/{user}/unfollow', [FollowerController::class, 'unfollow'])->name('users.unfollow');

    Route::post('/posts/{post}/like', [PostLikeController::class, 'like'])->name('users.like');
    Route::delete('/posts/{post}/unlike', [PostLikeController::class, 'unlike'])->name('users.unlike');

    Route::get('/lang/{lang}', function ($lang) {
        App::setLocale($lang);
        session()->put('locale', $lang);

        return redirect()->back();
    })->name('locale.setting');

    Route::get('/theme/{theme}', function ($theme) {
        session()->put('theme', $theme);
        return redirect()->back();
    })->name('bg-theme');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/users/{user}', 'show')->name('users.show');
    Route::get('/profile', 'profile')->name('profile');
    Route::get('/users/{user}/edit', 'edit')->name('users.edit');
    Route::put('/users/{user}', 'update')->name('users.update');
});



Route::get('/sistema', [AdminAuthController::class, 'login'])->name('admin.login');
Route::post('/sistema', [AdminAuthController::class, 'authenticate']);
Route::get('/sistema/dashboard', [AdminDashboardController::class, 'index'])->middleware('admin')->name('admin.dashboard');
Route::delete('/logout', [AdminAuthController::class, 'destroy'])->name('admin.logout');
