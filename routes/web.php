<?php

use App\Http\Controllers\DiaryController;
use App\Http\Controllers\ChatGPTController;
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


Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/incomplete', function () {
    return view('incomplete');
})->name('incomplete');

//以下は既存のログインページに必要なルート
Route::middleware('auth')->group(function () {
    Route::get('/photo-reader/index', [PhotoreaderController::class, 'index'])->name('photo-reader.index');
    Route::post('/food-configuration/index', [ChatGPTController::class, 'getIngredientsList'])->name('food-configuration.index');
    Route::post('/recipe/index', [RecipeController::class, 'search'])->name('recipe.index');

    // 日記登録用のビューを表示するルート
    Route::get('/diary/create', [DiaryController::class, 'create'])->name('diary.create');
    // 日記一覧を表示するルート
    Route::get('/dirary/index', [DiaryController::class, 'index'])->name('diary.index');
    // 日記を保存するルート
    Route::post('diary/store', [DiaryController::class, 'store'])->name('diary.store');

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
