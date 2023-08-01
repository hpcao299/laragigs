<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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

// Show create listing form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// Show manage listings page
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

// Get single listing by id
Route::get('/listings/{id}', [ListingController::class, 'show']);

// Store new listing data
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

// Show edit form
Route::get('/listings/{id}/edit', [ListingController::class, 'edit'])->middleware('auth');

// Edit submit to update
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

// Delete listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');


// 

// Show user registration form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Register new user
Route::post('/users', [UserController::class, 'store'])->middleware('guest');

// Login user
Route::post('/users/authenticate', [UserController::class, 'authenticate'])->middleware('guest');

// Logout
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
