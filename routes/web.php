<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\RevisorController;

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

Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/profile', [PublicController::class, 'profile'])->name('profile');
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::patch('/add/{article}', [CartController::class, 'add'])->name('add');
Route::patch('/remove/{article}', [CartController::class, 'remove'])->name('remove');

// articles crud
Route::get('/index', [ArticleController::class, 'index'])->name('article.index');
Route::get('/create', [ArticleController::class, 'create'])->name('article.create');
Route::get('/show/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/edit/{article}', [ArticleController::class, 'edit'])->name('article.edit');
Route::put('/update/{article}', [ArticleController::class, 'update'])->name('article.update');

// ricerca
Route::get('/article/search', [PublicController::class, 'searchArticles'])->name('article.search');
// categoria
Route::get('category/{category}', [PublicController::class, 'categoryShow'])->name('categoryShow');



// lingua

Route::post('/lingua/{lang}', [PublicController::class, 'setLanguage'])->name('setLocale');

// revisor
Route::get('/lavora-con-noi', [RevisorController::class, 'workWithUs'])->middleware('auth')->name('work');
Route::post('/workSubmit', [RevisorController::class, 'workSubmit'])->name('workSubmit');

Route::get('/make/revisor/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');

Route::get('revisor/index', [RevisorController::class, 'index'])->name('revisor.index');
Route::patch('/accept/{article}', [RevisorController::class, 'accept'])->name('accept');
Route::patch('/reject/{article}', [RevisorController::class, 'reject'])->name('reject');
Route::patch('/undo/{article}', [RevisorController::class, 'undo'])->name('undo');
Route::resource('images', ImageController::class);
