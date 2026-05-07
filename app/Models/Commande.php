<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'demande_id', 'fournisseur_id', 'reference', 'montant', 'statut'
    ];

    public function demande()
    {
        return $this->belongsTo(Demande::class);
    }

    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class);
    }

    public function receptions()
    {
        return $this->hasMany(Reception::class);
    }

    public function facture()
    {
        return $this->hasOne(Facture::class);
    }
}
