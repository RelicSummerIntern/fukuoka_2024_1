<?php

use App\Http\Controllers\DiaryController;
use App\Http\Controllers\FoodconfigrationController;
use App\Http\Controllers\FoofconfirationController;
use App\Http\Controllers\PhotoreaderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RecipeController;
use App\Models\Diary;
use App\Models\Recipe;
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

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
})->name('home');

//ログインページおよび新規登録画面は既存のページにリダイレクト
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');
//

Route::get('/phot-reader/index', [PhotoreaderController::class, 'index'])->name('photo-reader.index');


Route::get('/food-configration/index', [FoodconfigrationController::class, 'index'])->name('food-configration.index');


Route::get('/recipe/index', [RecipeController::class, 'index'])->name('recipe.index');


Route::get('/diary-post/index', [DiaryController::class, 'post_index'])->name('diary-post.index');


Route::get('/dirary-index/index', [DiaryController::class, 'index_index'])->name('diary-index.index');


//以下は既存のログインページに必要なルート
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/post/index', [PostController::class, 'index'])->name('post.index');
    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
    Route::get('/post/{id}', [PostController::class, 'edit'])->name('post.edit');
    Route::patch('/post/{id}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/post/{id}', [PostController::class, 'destroy'])->name('post.destroy');

    Route::get('/myposts', [PostController::class, 'myPosts'])->name('myposts');
});

require __DIR__ . '/auth.php';
