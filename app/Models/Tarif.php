<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    protected $fillable = [
        'inscription',
        'mensualite',
        'autre_frais',
        'actif'
    ];

    protected $casts = [
        'inscription' => 'decimal:2',
        'mensualite'  => 'decimal:2',
        'autre_frais' => 'decimal:2',
        'actif'       => 'boolean',
    ];

    // ===============================
    // Relations
    // ===============================

    public function classes()
    {
        return $this->belongsToMany(Classe::class, 'tarif_classe')
            ->withPivot(['actif'])
            ->withTimestamps();
    }

    // ===============================
    // Scope
    // ===============================

    public function scopeActif($query)
    {
        return $query->where('actif', true);
    }

    protected static function booted()
    {
        static::deleting(function ($tarif) {

            if ($tarif->classes()->exists()) {
                throw new \Exception(
                    'Impossible de supprimer : ce tarif est associé à une classe.'
                );
            }

        });
    }
}
