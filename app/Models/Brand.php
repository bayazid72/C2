<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    // Vulbare velden voor mass assignment
    protected $fillable = ['name'];

    // Relatie naar Manuals
    public function manuals()
    {
        return $this->hasMany(Manual::class);
    }

    // Verkrijg een URL-gecodeerde versie van de merknaam
    public function getNameUrlEncodedAttribute()
    {
        return str_replace('/', '', $this->name);
    }

    // Methode om de populairste handleidingen op te halen
    public function getTopManuals($limit = 5)
    {
        return $this->manuals()
            ->orderBy('views', 'desc') // Sorteer op basis van views
            ->take($limit) // Beperk het aantal resultaten
            ->get();
    }
}
