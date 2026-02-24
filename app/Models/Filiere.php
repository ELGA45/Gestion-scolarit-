<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    protected $fillable = ['code', 'nom'];

    public function classes()
    {
        return $this->hasMany(Classe::class);
    }

    protected static function booted()
    {
        static::saving(function ($filiere) {
            $filiere->code = trim($filiere->code);
            $filiere->nom  = trim($filiere->nom);

            if (empty($filiere->code) || empty($filiere->nom)) {
                throw new \Exception("Code et nom ne peuvent pas être vides.");
            }
        });

        static::deleting(function ($filiere) {
            if ($filiere->classes()->exists()) {
                throw new \Exception(
                    "Impossible de supprimer : cette filière contient des classes."
                );
            }
        });
    }
}