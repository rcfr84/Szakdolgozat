<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CountyController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\UserController;

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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //CATEGORY
    Route::get('/categories/action', [CategoryController::class, 'action'])->name('categories.action');
    Route::get('/categories', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{categoryId}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{categoryId}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{categoryId}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    //ADVERTISEMENT
    Route::get('/advertisements/own', [AdvertisementController::class, 'ownAdvertisements'])->name('advertisements.own');
    Route::get('/advertisements/create', [AdvertisementController::class, 'create'])->name('advertisements.create');
    Route::post('/advertisements/create', [AdvertisementController::class, 'store'])->name('advertisements.store');
    Route::get('/advertisements/{advertisementId}/edit', [AdvertisementController::class, 'edit'])->name('advertisements.edit');
    Route::put('/advertisements/{advertisementId}', [AdvertisementController::class, 'update'])->name('advertisements.update');
    Route::delete('/advertisements/{advertisementId}', [AdvertisementController::class, 'destroy'])->name('advertisements.destroy');
    Route::get('/editCountyAndCity/{advertisementId}', [AdvertisementController::class, 'editCountyAndCity'])->name('advertisements.editCountyAndCity');
    Route::put('/editCountyAndCity/{advertisementId}', [AdvertisementController::class, 'updateCountyAndCity'])->name('advertisements.updateCountyAndCity');
    Route::get('/advertisements/own/search', [AdvertisementController::class, 'searchByTitleOwn'])->name('advertisements.searchByTitleOwn');

    //MESSAGE
    Route::get('/messages/get', [MessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/create/{receiverId}', [MessageController::class, 'create'])->name('messages.create');
    Route::get('/messages/{user1_id}/get/{user2_id}', [MessageController::class, 'showConversation'])->name('messages.showConversation');
    Route::post('/messages/create/{receiverId}', [MessageController::class, 'store'])->name('messages.store');
    Route::get('/messages/{messageId}/edit', [MessageController::class, 'edit'])->name('messages.edit');
    Route::put('/messages/{messageId}', [MessageController::class, 'update'])->name('messages.update');
    Route::delete('/messages/{messageId}', [MessageController::class, 'destroy'])->name('messages.destroy');

    //PICTURE
    Route::get('/pictures/{advertisementId}', [PictureController::class, 'index'])->name('pictures.index');
    Route::get('/pictures/create/{advertisementId}', [PictureController::class, 'create'])->name('pictures.create');
    Route::post('/pictures/create/{advertisementId}', [PictureController::class, 'store'])->name('pictures.store');
    Route::delete('/pictures/{pictureId}', [PictureController::class, 'destroy'])->name('pictures.destroy');

    //USER
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::delete('/users/{userId}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/users/search', [UserController::class, 'searchByName'])->name('users.searchByName');

    //COUNTY
    Route::get('/counties', [CountyController::class, 'index'])->name('counties.index');
    Route::get('/counties/create', [CountyController::class, 'create'])->name('counties.create');
    Route::post('/counties', [CountyController::class, 'store'])->name('counties.store');
    Route::get('/counties/{countyId}', [CountyController::class, 'edit'])->name('counties.edit');
    Route::put('/counties/{countyId}', [CountyController::class, 'update'])->name('counties.update');
    Route::delete('/counties/{countyId}', [CountyController::class, 'destroy'])->name('counties.destroy');

    //CITY
    Route::get('/cities/county/{countyId}', [CityController::class, 'index'])->name('cities.index');
    Route::get('/cities/create/county/{countyId}', [CityController::class, 'create'])->name('cities.create');
    Route::post('/cities/create/county/{countyId}', [CityController::class, 'store'])->name('cities.store');
    Route::get('/cities/{cityId}', [CityController::class, 'edit'])->name('cities.edit');
    Route::put('/cities/{cityId}', [CityController::class, 'update'])->name('cities.update');
    Route::delete('/cities/{cityId}', [CityController::class, 'destroy'])->name('cities.destroy');
});

// CATEGORY
Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/allCategories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{categoryId}', [AdvertisementController::class, 'showByCategory'])->name('categories.show');

//ADVERTISEMENT
Route::get('/advertisements', [AdvertisementController::class, 'index'])->name('advertisements.index');
Route::get('get-cities-by-county/{countyId}', [AdvertisementController::class, 'getCitiesByCounty'])->name('get-cities-by-county');
Route::get('/advertisements/{advertisementId}/show', [AdvertisementController::class, 'show'])->name('advertisements.show');
Route::get('/search', [AdvertisementController::class, 'searchByTitle'])->name('advertisements.searchByTitle');
Route::get('/filter', [AdvertisementController::class, 'filter'])->name('advertisements.filter');


require __DIR__.'/auth.php';
