<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Manual;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Haal de 10 populairste handleidingen op
        $topManuals = Manual::with('brand')
            ->orderBy('views', 'desc')
            ->take(10)
            ->get();

        // Haal ook de merken op
        $brands = Brand::all();

        return view('pages/manual_view', compact('topManuals', 'brands'));
    }
}
