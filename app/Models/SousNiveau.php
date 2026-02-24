<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SousNiveau extends Model
{
    protected $fillable = ['code', 'nom', 'niveau_id'];

    public function niveau()
    {
        return $this->belongsTo(Niveau::class);
    }

    protected static function booted()
    {
        static::saving(function ($sousNiveau) {

            $sousNiveau->code = trim($sousNiveau->code);
            $sousNiveau->nom  = trim($sousNiveau->nom);

            if (empty($sousNiveau->code) || empty($sousNiveau->nom)) {
                throw new \Exception("Code et nom ne peuvent pas être vides.");
            }

            // Insensible à la casse
            $exists = self::where(function ($q) use ($sousNiveau) {
                    $q->whereRaw('LOWER(code) = ?', [strtolower($sousNiveau->code)])
                      ->orWhereRaw('LOWER(nom) = ?', [strtolower($sousNiveau->nom)]);
                })
                ->when($sousNiveau->id, fn ($q) => $q->where('id', '!=', $sousNiveau->id))
                ->exists();

            if ($exists) {
                throw new \Exception("Code ou nom déjà existant.");
            }

            $sousNiveau->code = strtoupper($sousNiveau->code);
            $sousNiveau->nom  = ucfirst(strtolower($sousNiveau->nom));
        });
    }
}