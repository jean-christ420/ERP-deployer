<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Demande>
 */
class DemandeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'reference' => 'PR-' . rand(1000, 9999),
            'demandeur' => 'Admin',
            'beneficiaire' => fake()->company(),
            'service' => fake()->word(),
            'type' => fake()->randomElement(['achat', 'fonds', 'paiement']),
            'objet' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'justification' => fake()->paragraph(),
            'montant' => fake()->numberBetween(1000, 100000),
            'statut' => fake()->randomElement(['en_attente', 'approuve', 'rejete', 'en_cours']),
        ];
    }
}
