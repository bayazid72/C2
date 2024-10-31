<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; // Voeg dit toe

class ContactController extends Controller
{
    // Toon het contactformulier
    public function index()
    {
        return view('contact.index'); // Laadt het contactformulier
    }

    // Verwerk het contactformulier
    public function store(Request $request)
    {
        // Valideer de invoer
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Inhoud van het formulier opslaan in een .txt bestand
        $contactData = "Naam: " . $request->name . "\n" .
                       "Email: " . $request->email . "\n" .
                       "Bericht: " . $request->message . "\n";

        // Sla het bestand op in de public folder met een unieke naam
        $fileName = 'contact_' . time() . '.txt';
        File::put(public_path($fileName), $contactData);

        return redirect()->route('contact.index')->with('success', 'Uw bericht is verzonden!');
    }
}
