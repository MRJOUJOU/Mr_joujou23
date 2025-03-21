<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oeuvre extends Model {
    use HasFactory;

    protected $fillable = [
        'titre', 'artiste', 'annee_fabrication', 'date_acquisition',
        'prix_estime', 'description', 'image', 'categorie_id'
    ];

    public function categorie() {
        return $this->belongsTo(Categorie::class);
    }
}
