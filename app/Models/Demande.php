<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Demande extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'demandeur',
        'beneficiaire',
        'service',
        'direction',
        'entreprise',
        'fournisseur',
        'piece_justificative',
        'observations',
        'libelle_facture',
        'type',
        'objet',
        'description',
        'justification',
        'montant',
        'statut',
    ];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }

    public function approvals()
    {
        return $this->hasMany(Approval::class);
    }

    public function validations()
    {
        return $this->hasMany(Validation::class);
    }
}
