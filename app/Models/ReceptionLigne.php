<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceptionLigne extends Model
{
    use HasFactory;

    protected $fillable = [
        'reception_id', 'produit_id', 'quantite'
    ];

    public function reception()
    {
        return $this->belongsTo(Reception::class);
    }

    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
}
