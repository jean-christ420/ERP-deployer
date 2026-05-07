<?php

namespace App\Services;

use App\Models\Commande;
use App\Models\Demande;
use Illuminate\Support\Facades\DB;
use Exception;

class CommandeService
{
    public function createFromDemande(Demande $demande, array $data): Commande
    {
        return DB::transaction(function () use ($demande, $data) {
            $fournisseurId = isset($data['fournisseur_id']) ? (int) $data['fournisseur_id'] : null;
            $reference = isset($data['reference']) ? trim($data['reference']) : 'CMD-' . time();
            
            // Calcul backend du montant
            $montant = 0.0;
            foreach ($demande->articles as $article) {
                $montant += ((float) $article->quantite * (float) $article->prix);
            }

            $commande = Commande::create([
                'demande_id' => $demande->id,
                'fournisseur_id' => $fournisseurId,
                'reference' => $reference,
                'montant' => $montant,
                'statut' => 'en_attente',
            ]);
            
            // Mettre à jour la demande
            $demande->update(['statut' => 'en_commande']);

            return $commande;
        });
    }
}
