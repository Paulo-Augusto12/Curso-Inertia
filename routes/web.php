<?php

use App\Http\Controllers\PostsController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Route::get('/home', function () {
//     return Inertia::render('Home');
// });

Route::get('/about', function () {
    return Inertia::render('About');
})->name('about');

Route::get('/posts', [PostsController::class, 'index'])->name('posts');

Route::get('/user', function () {
    return inertia::render('User', ['name' => 'Paulo', 'email' => 'paulo@paulo']);
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [PostsController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/create-post', [PostsController::class, 'create'])->name('create');
    Route::post('/dashboard/store-post', [PostsController::class, 'store'])->name('posts.store');
    Route::Get('/dashboard/edit-post/{id}', [PostsController::class, 'edit'])->name('edit-post');
    Route::put('/dashboard/update-post/{id}', [PostsController::class, 'update'])->name('post.update');
    Route::delete('/dashboard/delete-post/{id}', [PostsController::class, 'destroy'])->name('post.delete');
});
