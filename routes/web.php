<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstAuthor;
use App\Http\Controllers\BlogpostController;


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
});
Route::get('/myblog', [FirstAuthor::class, 'index']);
Route::post('/authors', [FirstAuthor::class, 'create']);
Route::get('/authors', [FirstAuthor::class, 'authors']);
Route::get('/authors/{id}', [FirstAuthor::class, 'getSingleAuthors']);
Route::put('/authors/{id}', [FirstAuthor::class, 'update']);
Route::delete('/authors/{id}', [FirstAuthor::class, 'delete']);

///blogposts routing
Route::post('/authors/createblogposts', [BlogpostController::class, 'createBlogposts']);
Route::get('//authors/createblogposts', [BlogpostController::class, 'Blogposts']);
Route::get('/authors/createblogposts/{id}', [BlogpostController::class, 'getSingleBlogposts']);
Route::put('/authors/createblogposts/{id}', [BlogpostController::class, 'update']);
Route::delete('/authors/createblogposts/{id}', [BlogpostController::class, 'delete']);
