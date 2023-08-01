<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // Show all listings
    public function index()
    {
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(4),
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
                'listing' => $found_listing
            ]);
        }
    }

    // Show create listing form
    public function create()
    {
        return view('listings.create');
    }

    // Store new listing data
    public function store()
    {
        $formFields = request()->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
        ]);

        if (request()->hasFile('logo')) {
            $formFields['logo'] = request()->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing created successfully!');
    }

    // Show edit form
    public function edit($id)
    {
        $found_listing = Listing::find($id);

        if (empty($found_listing)) {
            return response()->view('listings.edit')->setStatusCode(404);
        } else {
            return view('listings.edit', [
                'listing' => $found_listing
            ]);
        }
    }

    // Edit submit to update
    public function update(Request $request, Listing $listing)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);

        return redirect('/listings/' . $listing->id)->with('message', 'Listing updated successfully!');
    }

    // Delete listing
    public function destroy(Listing $listing)
    {
        $listing->delete();

        return redirect('/')->with('message', 'Listing deleted successfully!');
    }
}
