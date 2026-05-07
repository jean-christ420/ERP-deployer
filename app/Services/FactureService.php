<?php

namespace App\Services;

use App\Models\Facture;
use App\Models\Commande;
use Illuminate\Support\Facades\DB;
use Exception;

class FactureService
{
    public function createFacture(Commande $commande, array $data): Facture
    {
        return DB::transaction(function () use ($commande, $data) {
            $reference = isset($data['reference']) ? trim($data['reference']) : 'FCT-' . time();
            $dateEcheance = isset($data['date_echeance']) ? trim($data['date_echeance']) : null;
            
            $montant = (float) $commande->montant;

            return Facture::create([
                'commande_id' => $commande->id,
                'reference' => $reference,
                'montant' => $montant,
                'date_echeance' => $dateEcheance,
                'statut' => 'non_paye',
            ]);
        });
    }
}
