<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
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
        'canRegister' => Route::has('registerkslnflkanskfn;alsfja;lsj'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/items', [ItemController::class, 'index'])->name('item.index');
    Route::get('/items-add', [ItemController::class, 'add'])->name('item.add');
    Route::get('/items/{id}/edit-unit', [ItemController::class, 'editUnit'])->name('item.edit-unit');
    Route::patch('/items/{id}/edit-unit', [ItemController::class, 'storeEditUnit']);
    Route::get('/items/{id}/edit-stock', [ItemController::class, 'editStock'])->name('item.edit-stock');
    Route::patch('/items/{id}/edit-stock', [ItemController::class, 'storeEditStock']);
    Route::get('/items/{id}/stockcard', [ItemController::class, 'stockcard'])->name('item.stockcard');
    Route::post('/items', [ItemController::class, 'store'])->name('item.store');
});

require __DIR__.'/auth.php';
