<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\MenuItemController;
use App\Http\Controllers\Admin\MenuItemPageController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RubricController;
use App\Http\Controllers\Admin\StatusController;
use Illuminate\Support\Facades\Auth;
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
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/category/{id}/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::resource('category', CategoryController::class)->except(['show', 'delete', 'destroy']);

    Route::get('/comment/{id}/destroy', [CommentController::class, 'destroy'])->name('comment.destroy');
    Route::resource('comment', CommentController::class)->except(['show', 'delete', 'destroy', 'create']);

    Route::get('/menu/{id}/destroy', [MenuController::class, 'destroy'])->name('menu.destroy');
    Route::resource('menu', MenuController::class)->except(['show', 'delete', 'destroy']);

    Route::get('/menu-item/{id}/destroy', [MenuItemController::class, 'destroy'])->name('menu-item.destroy');
    Route::resource('menu-item', MenuItemController::class)->except(['show', 'delete', 'destroy']);

    Route::get('/page/{id}/destroy', [PageController::class, 'destroy'])->name('page.destroy');
    Route::resource('page', PageController::class)->except(['show', 'delete', 'destroy']);

    Route::get('/posts/{id}/destroy', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::resource('posts', PostController::class)->except(['show', 'delete', 'destroy']);

    Route::get('/rubric/{id}/destroy', [RubricController::class, 'destroy'])->name('rubric.destroy');
    Route::resource('rubric', RubricController::class)->except(['show', 'delete', 'destroy']);

    Route::get('/status/{id}/destroy', [StatusController::class, 'destroy'])->name('status.destroy');
    Route::resource('status', StatusController::class)->except(['show', 'delete', 'destroy']);

});

Auth::routes();

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
