<?php

namespace App\Services;

use App\Models\Demande;
use App\Models\User;
use Exception;

class ApprovalService
{
    /**
     * L'ordre strict des validations.
     *
     * @var array
     */
    protected array $validationOrder = [
        'directrice_achat',
        'tresorier',
        'questeur'
    ];

    /**
     * Valide une étape d'approbation.
     *
     * @param Demande $demande
     * @param string $role
     * @param User $user
     * @return void
     * @throws Exception
     */
    public function validateStep(Demande $demande, string $role, User $user)
    {
        // 1. Vérifier que la demande n'est pas déjà rejetée ou totalement approuvée
        if (in_array($demande->statut, ['rejete', 'approuve'])) {
            throw new Exception("Cette demande ne peut plus être validée car elle est au statut : {$demande->statut}.");
        }

        // 2. Vérifier que le rôle soumis fait partie de notre circuit
        if (!in_array($role, $this->validationOrder)) {
            throw new Exception("Le rôle soumis ({$role}) n'est pas valide pour ce circuit d'approbation.");
        }

        // 3. Sécurité : L'utilisateur connecté possède-t-il bien ce rôle ?
        if (!$user->hasRole($role)) {
            throw new Exception("Vous n'avez pas l'autorisation d'agir en tant que {$role}.");
        }

        // 4. Déterminer l'étape attendue (ordre strict)
        $expectedStep = $this->getCurrentExpectedStep($demande);

        if (!$expectedStep) {
            throw new Exception("Il n'y a plus d'étapes de validation en attente pour cette demande.");
        }

        // 5. Vérifier que le rôle soumis correspond exactement à l'étape attendue (protection anti-saut d'étape)
        if ($expectedStep->role !== $role) {
            throw new Exception("Ce n'est pas le tour du rôle '{$role}'. L'étape attendue est '{$expectedStep->role}'.");
        }

        // 6. Double validation check (est-ce que l'étape attendue est bien en attente ?)
        if ($expectedStep->statut !== 'en_attente') {
            throw new Exception("Cette étape de validation a déjà été traitée.");
        }

        // ==========================================
        // TOUTES LES VERIFICATIONS SONT OK -> ACTION
        // ==========================================

        // Mettre à jour la validation
        $expectedStep->update([
            'statut' => 'valide',
            'user_id' => $user->id,
            'validated_at' => now(),
        ]);

        // Mettre à jour le statut global de la demande
        $this->updateDemandeStatut($demande);
    }

    /**
     * Rejette une étape d'approbation.
     *
     * @param Demande $demande
     * @param string $role
     * @param User $user
     * @param string $commentaire
     * @return void
     * @throws Exception
     */
    public function rejectStep(Demande $demande, string $role, User $user, string $commentaire)
    {
        if (in_array($demande->statut, ['rejete', 'approuve'])) {
            throw new Exception("Cette demande ne peut plus être modifiée car elle est au statut : {$demande->statut}.");
        }

        if (!in_array($role, $this->validationOrder)) {
            throw new Exception("Le rôle soumis ({$role}) n'est pas valide pour ce circuit d'approbation.");
        }

        if (!$user->hasRole($role)) {
            throw new Exception("Vous n'avez pas l'autorisation d'agir en tant que {$role}.");
        }

        $expectedStep = $this->getCurrentExpectedStep($demande);

        if (!$expectedStep) {
            throw new Exception("Il n'y a plus d'étapes de validation en attente pour cette demande.");
        }

        if ($expectedStep->role !== $role) {
            throw new Exception("Ce n'est pas le tour du rôle '{$role}'. L'étape attendue est '{$expectedStep->role}'.");
        }

        if ($expectedStep->statut !== 'en_attente') {
            throw new Exception("Cette étape de validation a déjà été traitée.");
        }

        // ==========================================
        // TOUTES LES VERIFICATIONS SONT OK -> ACTION
        // ==========================================

        // Mettre à jour la validation
        $expectedStep->update([
            'statut' => 'rejete',
            'user_id' => $user->id,
            'commentaire' => $commentaire,
            'validated_at' => now(),
        ]);

        // Rejet global et immédiat de la demande
        $demande->update([
            'statut' => 'rejete'
        ]);
    }

    /**
     * Retourne la première étape de validation en attente, 
     * en respectant l'ordre strict défini.
     *
     * @param Demande $demande
     * @return \App\Models\Validation|null
     */
    public function getCurrentExpectedStep(Demande $demande)
    {
        // Les validations ont été insérées dans l'ordre par DemandeService.
        // On récupère toutes les validations ordonnées par leur id de création.
        $validations = $demande->validations()->orderBy('id', 'asc')->get();

        foreach ($validations as $validation) {
            // La première validation qui est toujours 'en_attente' est l'étape bloquante actuelle.
            if ($validation->statut === 'en_attente') {
                return $validation;
            }
        }

        return null;
    }

    /**
     * Met à jour le statut global de la demande en fonction des étapes complétées.
     *
     * @param Demande $demande
     * @return void
     */
    protected function updateDemandeStatut(Demande $demande)
    {
        $validations = $demande->validations()->get();
        
        $allValidated = true;
        $hasRejet = false;
        
        foreach ($validations as $validation) {
            if ($validation->statut === 'rejete') {
                $hasRejet = true;
            }
            if ($validation->statut === 'en_attente') {
                $allValidated = false;
            }
        }

        if ($hasRejet) {
            $demande->update(['statut' => 'rejete']);
        } elseif ($allValidated) {
            $demande->update(['statut' => 'approuve']);
        } else {
            // Si on arrive ici, il n'y a pas de rejet, et toutes ne sont pas validées.
            // Cela signifie qu'au moins une validation est passée, donc la demande est "en_cours".
            $demande->update(['statut' => 'en_cours']);
        }
    }
}
