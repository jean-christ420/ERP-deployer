<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Demande;


class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ✅ Créer un utilisateur
        $user = User::updateOrCreate([
            'email' => 'admin@test.com',
        ], [
            'name' => 'Admin',
            'password' => bcrypt('password'),
        ]);

        // ✅ Créer des demandes de test
        Demande::factory(20)->create();
    }
}
