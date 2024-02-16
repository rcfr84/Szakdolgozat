<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdvertisementController;

Route::get('/advertisements/{advertisementId}/show', [AdvertisementController::class, 'show'])->name('advertisements.show');

require __DIR__.'/auth.php';
