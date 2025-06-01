<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faxe extends Model
{
    use HasFactory;

     protected $fillable = ['nom', 'fichier', 'matiere_id', 'niveau_id', 'filiere_id'];

    // Relation vers Matiere
    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }

    // Relation vers Niveau
    public function niveau()
    {
        return $this->belongsTo(Niveau::class);
    }

    // Relation vers Filiere
    public function filiere()
    {
        return $this->belongsTo(Filiere::class);
    }
}
