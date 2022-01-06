<?php

use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    return view('welcome');
})->name('ballina');


Route::get('/{user:username}', [postController::class, 'showUser'])->name('user.show');

// Postimet
Route::group(['prefix' => 'post', 'as' => 'post.'], function () {
    Route::get('/{post:slug}', [postController::class, 'show'])->name('single');
});

// Kategorit
Route::group(['prefix' => 'kategoria', 'as' => 'category.'], function () {
    Route::get('/{category:slug}', [postController::class, 'showCategory'])->name('single');
});

Route::group(['prefix' => 'admin'], function () {
    Route::middleware(['auth:sanctum', 'verified',])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::get('/createpost', function () {
            return view('auth.post');
        })->name('create.post');

        Route::get('/post', function () {
            return view('auth.post.show');
        })->name('show.post');


        Route::get('/saves', function () {
            return view('auth.post.saves');
        })->name('saves.post');
    });
});
