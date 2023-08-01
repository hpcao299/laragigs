<?php

use App\Http\Controllers\ListingController;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

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

// Get all listings
Route::get('/', [ListingController::class, 'index']);

// Get single listing by id
Route::get('/listings/{id}', [ListingController::class, 'show']);

// Show create listing form
Route::get('/listings/create', [ListingController::class, 'create']);

// Store new listing data
Route::post('/listings', [ListingController::class, 'store']);

// Show edit form
Route::get('/listings/{id}/edit', [ListingController::class, 'edit']);

// Edit submit to update
Route::put('/listings/{listing}', [ListingController::class, 'update']);

// Delete listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy']);
