<?php

use App\Models\Tag;
use App\Models\Post;
use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoriesController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','verified'])->group(function () {
    Route::resource('/categories', CategoriesController::class);
    Route::post('/categories', [CategoriesController::class, 'store'])->name('categories.store');
    Route::get('/categories', function () {
        return view('categories', [
            'categories' => Category::all()
        ]);
    })->name('categories');
    Route::get('/categories/{category}/edit', [CategoriesController::class, 'edit'])->name('categories.edit');

    Route::get('/categories/{category_name}/{subcat}', [CategoriesController::class, 'show'])->name('categories.show');
});

Route::middleware(['auth','verified'])->group(function () {
    Route::resource('/tags', TagsController::class);
    Route::post('/tags', [TagsController::class, 'store'])->name('tags.store');
    Route::get('/tags', function () {
        return view('tags', [
            'tags' => Tag::all()
        ]);
    })->name('tags');
    Route::get('/tags/{tag}/edit', [TagsController::class, 'edit'])->name('tags.edit');

    Route::get('/tags/{tag_name}/{subcat}', [TagsController::class, 'show'])->name('tags.show');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('/posts', PostsController::class);
    Route::post('/posts', [PostsController::class, 'store'])->name('posts.store');
    Route::get('/posts', function () {
        return view('posts', [
            'posts' => Post::all()
        ]);
    })->name('posts');
    Route::get('/posts/{post}/edit', [PostsController::class, 'edit'])->name('posts.edit');

    Route::get('/posts/show/{post_title}/{subcat}', [PostsController::class, 'show'])->name('posts.show');
});

require __DIR__.'/auth.php';
