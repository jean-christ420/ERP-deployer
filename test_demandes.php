<?php
use App\Models\User;
use App\Services\DemandeService;
use App\Models\Demande;

$user = User::first();
if (!$user) {
    $user = User::factory()->create();
}

$service = new DemandeService();

try {
    // Test Achat
    $achatData = [
        'type' => 'achat',
        'direction' => 'DAP',
        'beneficiaire' => 'John Doe',
        'objet' => 'Test Achat',
        'description' => 'Achat de PC',
        'justification' => 'Renouvellement',
        'entreprise' => 'Dell',
        'libelle_facture' => 'Facture 123',
        'articles' => [
            ['description' => 'PC', 'quantite' => 2, 'prix' => 500000]
        ]
    ];
    $demandeAchat = $service->createDemande($achatData, $user->name);
    echo "Achat Demande created, ID: {$demandeAchat->id}, Montant: {$demandeAchat->montant}, Type: {$demandeAchat->type}, Validations: {$demandeAchat->validations()->count()}\n";

    // Test Fonds
    $fondsData = [
        'type' => 'fonds',
        'direction' => 'DDHS',
        'beneficiaire' => 'Jane Doe',
        'objet' => 'Test Fonds',
        'description' => 'Fonds de caisse',
        'justification' => 'Voyage pro',
        'montant_direct' => 150000
    ];
    $demandeFonds = $service->createDemande($fondsData, $user->name);
    echo "Fonds Demande created, ID: {$demandeFonds->id}, Montant: {$demandeFonds->montant}, Type: {$demandeFonds->type}, Validations: {$demandeFonds->validations()->count()}\n";

    // Test Reglement
    $reglementData = [
        'type' => 'reglement',
        'direction' => 'Trésorerie Générale',
        'beneficiaire' => 'Fournisseur XYZ',
        'objet' => 'Test Reglement',
        'description' => 'Reglement de facture',
        'justification' => 'Fin de mois',
        'fournisseur' => 'Fournisseur XYZ',
        'piece_justificative' => 'Facture F-1234',
        'montant_direct' => 250000
    ];
    $demandeReglement = $service->createDemande($reglementData, $user->name);
    echo "Reglement Demande created, ID: {$demandeReglement->id}, Montant: {$demandeReglement->montant}, Type: {$demandeReglement->type}, Validations: {$demandeReglement->validations()->count()}\n";

} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
