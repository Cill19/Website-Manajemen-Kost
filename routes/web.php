<?php

use App\Http\Controllers\BoardingHouseController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/find-kost', [BoardingHouseController::class, 'find'])->name('find-kost');
Route::get('/check-booking', [BookingController::class, 'check'])->name('check-booking');
Route::get('/find-results', [BoardingHouseController::class, 'findResults'])->name('find-kost.results');
Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/city/{slug}', [CityController::class, 'show'])->name('city.show');
Route::get('/kos/{slug}', [BoardingHouseController::class, 'show'])->name('kos.show');
Route::get('/kos/{slug}/rooms', [BoardingHouseController::class, 'rooms'])->name('kos.rooms');
Route::get('/kos/booking/{slug}/information', [BookingController::class, 'information'])->name('booking.information');
Route::post('/kos/booking/{slug}/information/save',[BookingController::class, 'saveInformation'])->name('booking.information.save');

Route::get('/kos/booking/{slug}',[BookingController::class, 'booking'])->name('booking');


