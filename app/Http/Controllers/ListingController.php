<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    // Show all listings
    public function index()
    {
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->get(),
        ]);
    }

    // Show single listing details
    public function show($id)
    {
        $found_listing = Listing::find($id);

        if (empty($found_listing)) {
            return response()->view('listings.show')->setStatusCode(404);
        } else {
            return view('listings.show', [
                'listing' => Listing::find($id)
            ]);
        }
    }
}
