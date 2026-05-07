<?php

namespace App\Services;

use App\Models\Demande;
use Illuminate\Support\Facades\DB;
use Exception;

class DemandeService
{
    public function createDemande(array $data, string $userName): Demande
    {
        return DB::transaction(function () use ($data, $userName) {
            $type = trim($data['type'] ?? '');
            $demande = Demande::create([
                'reference' => 'PR-' . strtoupper(uniqid()),
                'demandeur' => $userName,
                'beneficiaire' => trim($data['beneficiaire'] ?? ''),
                'direction' => trim($data['direction'] ?? ''),
                'type' => $type,
                'objet' => trim($data['objet'] ?? ''),
                'description' => trim($data['description'] ?? ''),
                'justification' => trim($data['justification'] ?? ''),
                'entreprise' => isset($data['entreprise']) ? trim($data['entreprise']) : null,
                'libelle_facture' => isset($data['libelle_facture']) ? trim($data['libelle_facture']) : null,
                'fournisseur' => isset($data['fournisseur']) ? trim($data['fournisseur']) : null,
                'piece_justificative' => isset($data['piece_justificative']) ? trim($data['piece_justificative']) : null,
                'observations' => isset($data['observations']) ? trim($data['observations']) : null,
                'statut' => 'en_attente',
                'montant' => 0, // Sera recalculé
            ]);

            $montantGlobal = 0;
            if ($type === 'achat') {
                $montantGlobal = $this->syncArticles($demande, $data['articles'] ?? []);
            } elseif ($type === 'fonds') {
                if (!empty($data['articles'])) {
                    $montantGlobal = $this->syncArticles($demande, $data['articles']);
                } else {
                    $montantGlobal = (float)($data['montant_direct'] ?? 0);
                }
            } elseif ($type === 'reglement') {
                $montantGlobal = (float)($data['montant_direct'] ?? 0);
            }
            
            $demande->update(['montant' => $montantGlobal]);

            // Create initial validations
            $demande->validations()->createMany([
                ['role' => 'directrice_achat', 'statut' => 'en_attente'],
                ['role' => 'tresorier', 'statut' => 'en_attente'],
                ['role' => 'questeur', 'statut' => 'en_attente'],
            ]);

            return $demande;
        });
    }

    public function updateDemande(Demande $demande, array $data): Demande
    {
        return DB::transaction(function () use ($demande, $data) {
            $type = trim($data['type'] ?? '');
            
            $demande->update([
                'beneficiaire' => trim($data['beneficiaire'] ?? ''),
                'direction' => trim($data['direction'] ?? ''),
                'type' => $type,
                'objet' => trim($data['objet'] ?? ''),
                'description' => trim($data['description'] ?? ''),
                'justification' => trim($data['justification'] ?? ''),
                'entreprise' => isset($data['entreprise']) ? trim($data['entreprise']) : null,
                'libelle_facture' => isset($data['libelle_facture']) ? trim($data['libelle_facture']) : null,
                'fournisseur' => isset($data['fournisseur']) ? trim($data['fournisseur']) : null,
                'piece_justificative' => isset($data['piece_justificative']) ? trim($data['piece_justificative']) : $demande->piece_justificative,
                'observations' => isset($data['observations']) ? trim($data['observations']) : null,
            ]);

            $montantGlobal = 0;
            if ($type === 'achat') {
                $montantGlobal = $this->syncArticles($demande, $data['articles'] ?? []);
            } elseif ($type === 'fonds') {
                if (!empty($data['articles'])) {
                    $montantGlobal = $this->syncArticles($demande, $data['articles']);
                } else {
                    $demande->articles()->delete();
                    $montantGlobal = (float)($data['montant_direct'] ?? 0);
                }
            } elseif ($type === 'reglement') {
                $demande->articles()->delete();
                $montantGlobal = (float)($data['montant_direct'] ?? 0);
            }

            $demande->update(['montant' => $montantGlobal]);

            return $demande;
        });
    }

    private function syncArticles(Demande $demande, array $articlesData): float
    {
        $demande->articles()->delete();
        $montantGlobal = 0.0;

        $articlesToInsert = [];
        foreach ($articlesData as $articleData) {
            $desc = trim($articleData['description'] ?? '');
            $qty = (float) ($articleData['quantite'] ?? 0);
            $prix = (float) ($articleData['prix'] ?? 0);

            if (empty($desc) && $qty <= 0) {
                continue; // Ignore invalid entries
            }

            if ($qty < 1) $qty = 1;
            if ($prix < 0) $prix = 0;

            $articlesToInsert[] = [
                'demande_id' => $demande->id,
                'description' => $desc,
                'quantite' => $qty,
                'prix' => $prix,
                'total' => $qty * $prix,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            $montantGlobal += ($qty * $prix);
        }

        if (count($articlesToInsert) > 0) {
            $demande->articles()->createMany($articlesToInsert);
        }

        return $montantGlobal;
    }
}
