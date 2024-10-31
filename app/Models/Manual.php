<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manual extends Model
{
    use HasFactory;

    // De vulbare velden voor mass assignment
    protected $fillable = [
        'title',
        'filesize',
        'originUrl',
        'brand_id',
        'views'
    ];

    // Relatie met het Brand model
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    // Retourneert de bestandsgrootte in een leesbaar formaat
    public function getFilesizeHumanReadableAttribute()
    {
        $size = $this->filesize;
        $unit = "";

        // Converteer de bestandsgrootte naar een leesbaar formaat
        if ($size >= 1 << 30) {
            return number_format($size / (1 << 30), 2) . " GB";
        } elseif ($size >= 1 << 20) {
            return number_format($size / (1 << 20), 2) . " MB";
        } elseif ($size >= 1 << 10) {
            return number_format($size / (1 << 10), 2) . " KB";
        } else {
            return number_format($size) . " bytes";
        }
    }

    // Retourneert true als het bestand lokaal beschikbaar is
    public function getLocallyAvailableAttribute()
    {
        // Hier kun je logica toevoegen om te controleren of het bestand lokaal beschikbaar is
        // Bijvoorbeeld: return file_exists(storage_path('app/manuals/' . $this->id . '.pdf'));
        return false; // Huidige implementatie geeft altijd false terug
    }

    // Verkrijgt de URL van de handleiding
    public function getUrlAttribute()
    {
        return $this->originUrl; // Hier kun je aangepaste logica toevoegen indien nodig
    }

    // Methode om de views van de handleiding te verhogen
    public function incrementViews()
    {
        $this->increment('views');
    }

    // Methode om handleidingen te filteren op merk
    public static function getByBrand($brandId)
    {
        return self::where('brand_id', $brandId)->get();
    }

    // Voeg hier eventueel andere methoden toe die je nodig hebt voor jouw applicatie
}
