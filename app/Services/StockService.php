<?php

namespace App\Services;

use App\Models\Produit;
use Illuminate\Support\Facades\DB;
use Exception;

class StockService
{
    public function addStock(int $produitId, int $quantite): void
    {
        DB::transaction(function () use ($produitId, $quantite) {
            if ($quantite <= 0) {
                throw new Exception("La quantité doit être supérieure à 0.");
            }
            
            $produit = Produit::lockForUpdate()->findOrFail($produitId);
            $produit->stock_actuel += $quantite;
            $produit->save();
        });
    }

    public function removeStock(int $produitId, int $quantite): void
    {
        DB::transaction(function () use ($produitId, $quantite) {
            if ($quantite <= 0) {
                throw new Exception("La quantité doit être supérieure à 0.");
            }

            $produit = Produit::lockForUpdate()->findOrFail($produitId);
            if ($produit->stock_actuel < $quantite) {
                throw new Exception("Stock insuffisant pour le produit {$produit->reference}.");
            }

            $produit->stock_actuel -= $quantite;
            $produit->save();
        });
    }
}
