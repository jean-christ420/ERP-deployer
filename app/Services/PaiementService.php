<?php

namespace App\Services;

use App\Models\Paiement;
use App\Models\Facture;
use Illuminate\Support\Facades\DB;
use Exception;

class PaiementService
{
    public function processPaiement(Facture $facture, array $data): Paiement
    {
        return DB::transaction(function () use ($facture, $data) {
            $montant = isset($data['montant']) ? (float) $data['montant'] : 0.0;
            $methode = isset($data['methode']) ? trim($data['methode']) : null;

            if ($montant <= 0) {
                throw new Exception("Le montant du paiement doit être supérieur à 0.");
            }

            $paiement = Paiement::create([
                'facture_id' => $facture->id,
                'montant' => $montant,
                'date_paiement' => now(),
                'methode' => $methode,
            ]);

            // Mettre à jour le statut de la facture si payée totalement
            $totalPaye = $facture->paiements()->sum('montant') + $montant;
            if ($totalPaye >= $facture->montant) {
                $facture->update(['statut' => 'paye']);
            } else {
                $facture->update(['statut' => 'partiellement_paye']);
            }

            return $paiement;
        });
    }
}
