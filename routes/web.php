<?php

use App\Http\Controllers\OptionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
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


Route::get('/', [PropertyController::class, 'welcome'])->name('welcome');
Route::post('/properties/contact/', [PropertyController::class, 'contact'])->name('properties.contact');
Route::get('/properties/{slug}-{id}', [PropertyController::class, 'show'])->name('admin.properties.show')->where(
    [
        'slug' => '[a-zA-Z0-9\-]+',
        'id' => '[0-9]+'
    ]
);

Route::get('/properties', [PropertyController::class, 'index'])->name('admin.properties.index');
Route::get('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('auth.login')->middleware('guest');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'doLogin']);
Route::delete('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('auth.logout');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('properties', PropertyController::class)->except(['show', 'index', 'edit']);
    Route::resource('options', OptionController::class);
});

Route::get('admin/properties/{id}/edit', [PropertyController::class, 'edit'])->name('admin.properties.edit')->where(
    [
        'id' => '[0-9]+'
    ]
);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
