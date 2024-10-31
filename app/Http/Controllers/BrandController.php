<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Manual;

class BrandController extends Controller
{
    // Method to show brand details and associated manuals
    public function show($brand_id, $brand_slug)
    {
        $brand = Brand::findOrFail($brand_id);
        $manuals = Manual::where('brand_id', $brand_id)->get();

        // Retrieve the most popular manuals for the brand
        $populaireHandleidingen = $brand->getTopManuals(5);

        return view('pages.manual_list', [
            'brand' => $brand,
            'manuals' => $manuals,
            'populaireHandleidingen' => $populaireHandleidingen,
        ]);
    }

    // Method to list brands, optionally filtered by the first letter
    public function index(Request $request)
    {
        // Retrieve selected letter filter from the request
        $selectedLetter = $request->input('filter_letter') ?? $request->input('letter');

        // Fetch brands based on the selected letter filter, if provided
        $brands = Brand::when($selectedLetter, function ($query) use ($selectedLetter) {
            return $query->where('name', 'LIKE', $selectedLetter . '%');
        })->orderBy('name')->get();

        return view('pages.homepage', [
            'brands' => $brands,
            'selectedLetter' => $selectedLetter,
        ]);
    }
}
