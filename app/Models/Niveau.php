<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    protected $fillable = ['nom'];

    public function sousNiveaux()
    {
        return $this->hasMany(SousNiveau::class);
    }

    protected static function booted()
    {
        static::saving(function ($niveau) {

            $niveau->nom = trim($niveau->nom);

            if (empty($niveau->nom)) {
                throw new \Exception("Le nom ne peut pas être vide.");
            }

            // Insensible à la casse
            $exists = self::whereRaw('LOWER(nom) = ?', [strtolower($niveau->nom)])
                ->when($niveau->id, fn ($q) => $q->where('id', '!=', $niveau->id))
                ->exists();

            if ($exists) {
                throw new \Exception("Ce niveau existe déjà.");
            }

            $niveau->nom = ucfirst(strtolower($niveau->nom));
        });

        static::deleting(function ($niveau) {
            if ($niveau->sousNiveaux()->exists()) {
                throw new \Exception(
                    "Impossible de supprimer : ce niveau contient des sous-niveaux."
                );
            }
        });
    }
}