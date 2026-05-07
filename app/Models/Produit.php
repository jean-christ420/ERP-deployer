<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference', 'nom', 'description', 'prix_unitaire', 'stock_actuel', 'seuil_alerte'
    ];
}
