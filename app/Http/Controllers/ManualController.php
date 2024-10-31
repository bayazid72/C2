<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Manual;

class ManualController extends Controller
{
    public function show($brand_id, $brand_slug, $manual_id)
    {
        // Haal de brand en handleiding op
        $brand = Brand::findOrFail($brand_id);
        $manual = Manual::findOrFail($manual_id); // Zorg ervoor dat dit de handleiding ophaalt

        // Increment de views_count-teller
        $manual->increment('views_count'); // Zorg ervoor dat je de juiste kolomnaam gebruikt

        // Geef de view weer met de variabelen
        return view('pages.manual_view', [ // Zorg ervoor dat het pad naar je view klopt
            "manual" => $manual,
            "brand" => $brand,
        ]);
    }


}
