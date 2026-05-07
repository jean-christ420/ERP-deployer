<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    use HasFactory;

    protected $fillable = [
        'demande_id', 'niveau', 'validateur_id', 'statut', 'commentaire'
    ];

    public function demande()
    {
        return $this->belongsTo(Demande::class);
    }

    public function validateur()
    {
        return $this->belongsTo(User::class, 'validateur_id');
    }
}
