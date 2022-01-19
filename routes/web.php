<?php

use App\Http\Controllers\MainController;
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

Route::get('/', [MainController::class, 'showBallina'])->name('ballina');
Route::get('/{user:username}', [MainController::class, 'showUser'])->name('user.show');
Route::get('/post/{post:slug}', [MainController::class, 'show'])->name('post.single');
Route::get('/kategoria/{category:slug}', [MainController::class, 'showCategory'])->name('category.single');


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::middleware(['auth:sanctum', 'verified',])->group(function () {
        Route::get('/dashboard',  [MainController::class, 'showAdminDashboard'])->name('dashboard');
        Route::get('/categorys',  [MainController::class, 'showAdminCategory'])->name('category');
        Route::get('/posts',  [MainController::class, 'showAdminPost'])->name('post');
        Route::get('/roles',  [MainController::class, 'showAdimRole'])->name('role');
        Route::get('/users',  [MainController::class, 'showAdminUser'])->name('user');
    });
});


Route::group(['prefix' => 'user'], function () {
    Route::middleware(['auth:sanctum', 'verified',])->group(function () {
        Route::get('/createpost', [MainController::class, 'showCreatePost'])->name('create.post');

        Route::get('/likes', [MainController::class, 'showPostLike'])->name('post.like');

        Route::get('/saves', [MainController::class, 'showPostSave'])->name('post.save');
    });

    Route::get('/chat',  [MainController::class, 'showChat'])->name('user.chat');
});



// Route::get('/user/chat/{follow:chat_id}', [MainController::class , 'showChatId'])->name('chat.show');
