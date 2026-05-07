<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('factures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('commande_id')->constrained()->onDelete('cascade');
            $table->string('reference')->unique();
            $table->decimal('montant', 15, 2);
            $table->date('date_echeance')->nullable();
            $table->string('statut')->default('non_paye');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('factures');
    }
};