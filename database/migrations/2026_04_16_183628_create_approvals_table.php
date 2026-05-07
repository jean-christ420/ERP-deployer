<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('approvals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('demande_id')->constrained()->onDelete('cascade');
            $table->integer('niveau');
            $table->foreignId('validateur_id')->constrained('users')->onDelete('cascade');
            $table->string('statut')->default('en_attente');
            $table->text('commentaire')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('approvals');
    }
};