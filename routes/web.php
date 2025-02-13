<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArsipController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProfileController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// useless routes
// Just to demo sidebar dropdown links active states.
Route::get('/buttons/text', function () {
    return view('buttons-showcase.text');
})->middleware(['auth'])->name('buttons.text');

Route::get('/buttons/icon', function () {
    return view('buttons-showcase.icon');
})->middleware(['auth'])->name('buttons.icon');

Route::get('/buttons/text-icon', function () {
    return view('buttons-showcase.text-icon');
})->middleware(['auth'])->name('buttons.text-icon');


Route::middleware(['auth'])->group(function () {
    Route::resource('kategori', KategoriController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('arsip', ArsipController::class);
    Route::get('/arsip/{id}/download', [ArsipController::class, 'download'])->name('arsip.download');
    Route::get('/about', [ArsipController::class, 'about'])->name('about.index');
});

require __DIR__ . '/auth.php';
