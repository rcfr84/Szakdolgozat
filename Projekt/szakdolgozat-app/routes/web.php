<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Kategória
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

    //Megye
    Route::get('counties', [CountyController::class, 'index'])->name('counties.index');

    //Város
    Route::get('cities', [CityController::class, 'index'])->name('cities.index');
});


Route::middleware(['CheckRole:admin'])->group(function (){

    //Kategória
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{categoryId}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{categoryId}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{categoryId}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});

require __DIR__.'/auth.php';
