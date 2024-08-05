<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;  //外部にあるPostControllerクラスをインポート
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StudentController;

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

Route::get('/', [PostController::class, 'index']);
Route::get('/posts/create', [PostController::class, 'create']);
///posts/{post}にGetリクエストが来たら、PostControllerのshowメソッドを実行する
Route::get('/posts/{post}', [PostController::class, 'show']);
Route::post('/posts', [PostController::class, 'store']);
//ブログ投稿編集画面の表示
Route::get('/posts/{post}/edit', [PostController::class, 'edit']);
//ブログ投稿編集実行
Route::put('/posts/{post}', [PostController::class, 'update']);
Route::delete('/posts/{post}', [PostController::class, 'delete']);
Route::get('/categories/{category}', [CategoryController::class, 'index']);
/*
Route::get('/', [StudentController::class, 'index']);
Route::get('/students/create', [StudentController::class, 'create']);
Route::post('/students', [StudentController::class, 'store']);
Route::delete('/students/{student}', [StudentController::class, 'delete']);
*/