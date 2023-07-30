<?php

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
Route::get('/', function () {
    return view('listings', [
        'listings' => Listing::all(),
    ]);
});

// Get single listing by id
Route::get('/listings/{id}', function ($id) {
    $found_listing = Listing::find($id);

    if (empty($found_listing)) {
        return response()->view('listing')->setStatusCode(404);
    } else {
        return view('listing', [
            'listing' => Listing::find($id)
        ]);
    }
});
