<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CountyController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PictureController;

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
    Route::get('get-cities-by-county/{countyId}', [AdvertisementController::class, 'getCitiesByCounty'])->name('get-cities-by-county');
    Route::get('/advertisements/own', [AdvertisementController::class, 'ownAdvertisements'])->name('advertisements.own');
    Route::get('/advertisements/create', [AdvertisementController::class, 'create'])->name('advertisements.create');
    Route::post('/advertisements/create', [AdvertisementController::class, 'store'])->name('advertisements.store');
    Route::get('/advertisements/{advertisementId}/edit', [AdvertisementController::class, 'edit'])->name('advertisements.edit');
    Route::put('/advertisements/{advertisementId}', [AdvertisementController::class, 'update'])->name('advertisements.update');
    Route::delete('/advertisements/{advertisementId}', [AdvertisementController::class, 'destroy'])->name('advertisements.destroy');
    Route::get('/advertisements/{advertisementId}/show', [AdvertisementController::class, 'show'])->name('advertisements.show');

    //MESSAGE
    Route::get('/messages/get', [MessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/create/{receiverId}', [MessageController::class, 'create'])->name('messages.create');
    Route::get('/messages/{user1_id}/get/{user2_id}', [MessageController::class, 'showConversation'])->name('messages.showConversation');
    Route::post('/messages/create/{receiverId}', [MessageController::class, 'store'])->name('messages.store');
    Route::get('/messages/{messageId}/edit', [MessageController::class, 'edit'])->name('messages.edit');
    Route::put('/messages/{messageId}', [MessageController::class, 'update'])->name('messages.update');
    Route::delete('/messages/{messageId}', [MessageController::class, 'destroy'])->name('messages.destroy');

    //PICTURE
    Route::get('/pictures', [PictureController::class, 'index'])->name('pictures.index');
    Route::get('/pictures/create', [PictureController::class, 'create'])->name('pictures.create');
    Route::post('/pictures', [PictureController::class, 'store'])->name('pictures.store');
    Route::delete('/pictures/{pictureId}', [PictureController::class, 'destroy'])->name('pictures.destroy');
});


/* Route::middleware(['CheckRole:admin'])->group(function (){

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

    //MESSAGE
    Route::get('/messages/{messageId}/edit', [MessageController::class, 'edit'])->name('messages.edit');
    Route::put('/messages/{messageId}', [MessageController::class, 'update'])->name('messages.update');
    Route::delete('/messages/{messageId}', [MessageController::class, 'destroy'])->name('messages.destroy');

    //PICTURE
    Route::delete('/pictures/{pictureId}', [PictureController::class, 'destroy'])->name('pictures.destroy');

}); */

require __DIR__.'/auth.php';
