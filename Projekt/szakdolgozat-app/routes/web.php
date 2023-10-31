<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CountyController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\AdvertisementController;

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

    //CATEGORY
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

    //COUNTY
    Route::get('/counties', [CountyController::class, 'index'])->name('counties.index');

    //CITY
    Route::get('/cities', [CityController::class, 'index'])->name('cities.index');

    //ADVERTISEMENT
    Route::get('/advertisements', [AdvertisementController::class, 'index'])->name('advertisements.index');
    Route::get('/advertisements/create', [AdvertisementController::class, 'create'])->name('advertisements.create');
    Route::post('/advertisements', [AdvertisementController::class, 'store'])->name('advertisements.store');
    Route::get('/advertisements/{advertisementId}/edit', [AdvertisementController::class, 'edit'])->name('advertisements.edit');
    Route::put('/advertisements/{advertisementId}', [AdvertisementController::class, 'update'])->name('advertisements.update');
    Route::delete('/advertisements/{advertisementId}', [AdvertisementController::class, 'destroy'])->name('advertisements.destroy');

});

Route::middleware(['CheckRole:admin'])->group(function (){

    //CATEGORY
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{categoryId}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{categoryId}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{categoryId}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    //ADVERTISEMENT
    Route::get('/advertisements/{advertisementId}/edit', [AdvertisementController::class, 'edit'])->name('advertisements.edit');
    Route::put('/advertisements/{advertisementId}', [AdvertisementController::class, 'update'])->name('advertisements.update');
    Route::delete('/advertisements/{advertisementId}', [AdvertisementController::class, 'destroy'])->name('advertisements.destroy');
});

require __DIR__.'/auth.php';
