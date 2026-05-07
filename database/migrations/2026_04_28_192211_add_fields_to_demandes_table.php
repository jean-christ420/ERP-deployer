<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('demandes', function (Blueprint $table) {
            $table->string('direction')->nullable()->after('service');
            $table->string('entreprise')->nullable()->after('direction');
            $table->string('fournisseur')->nullable()->after('entreprise');
            $table->text('piece_justificative')->nullable()->after('fournisseur');
            $table->text('observations')->nullable()->after('piece_justificative');
            $table->string('libelle_facture')->nullable()->after('observations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('demandes', function (Blueprint $table) {
            $table->dropColumn([
                'direction',
                'entreprise',
                'fournisseur',
                'piece_justificative',
                'observations',
                'libelle_facture'
            ]);
        });
    }
};
