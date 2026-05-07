<?php

$dir = __DIR__ . '/database/migrations';
$files = scandir($dir);

foreach ($files as $file) {
    if (strpos($file, 'create_fournisseurs_table') !== false) {
        $content = "<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('fournisseurs', function (Blueprint \$table) {
            \$table->id();
            \$table->string('nom');
            \$table->string('email')->nullable();
            \$table->string('telephone')->nullable();
            \$table->text('adresse')->nullable();
            \$table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('fournisseurs');
    }
};";
        file_put_contents("$dir/$file", $content);
    }
    
    if (strpos($file, 'create_produits_table') !== false) {
        $content = "<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('produits', function (Blueprint \$table) {
            \$table->id();
            \$table->string('reference')->unique();
            \$table->string('nom');
            \$table->text('description')->nullable();
            \$table->decimal('prix_unitaire', 15, 2)->default(0);
            \$table->integer('stock_actuel')->default(0);
            \$table->integer('seuil_alerte')->default(5);
            \$table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('produits');
    }
};";
        file_put_contents("$dir/$file", $content);
    }

    if (strpos($file, 'create_commandes_table') !== false) {
        $content = "<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('commandes', function (Blueprint \$table) {
            \$table->id();
            \$table->foreignId('demande_id')->constrained()->onDelete('cascade');
            \$table->foreignId('fournisseur_id')->nullable()->constrained()->onDelete('set null');
            \$table->string('reference')->unique();
            \$table->decimal('montant', 15, 2);
            \$table->string('statut')->default('en_attente');
            \$table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('commandes');
    }
};";
        file_put_contents("$dir/$file", $content);
    }

    if (strpos($file, 'create_receptions_table') !== false) {
        $content = "<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('receptions', function (Blueprint \$table) {
            \$table->id();
            \$table->foreignId('commande_id')->constrained()->onDelete('cascade');
            \$table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            \$table->date('date_reception');
            \$table->string('status')->default('partielle');
            \$table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('receptions');
    }
};";
        file_put_contents("$dir/$file", $content);
    }

    if (strpos($file, 'create_reception_lignes_table') !== false) {
        $content = "<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('reception_lignes', function (Blueprint \$table) {
            \$table->id();
            \$table->foreignId('reception_id')->constrained()->onDelete('cascade');
            \$table->foreignId('produit_id')->constrained()->onDelete('cascade');
            \$table->integer('quantite');
            \$table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('reception_lignes');
    }
};";
        file_put_contents("$dir/$file", $content);
    }

    if (strpos($file, 'create_factures_table') !== false) {
        $content = "<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('factures', function (Blueprint \$table) {
            \$table->id();
            \$table->foreignId('commande_id')->constrained()->onDelete('cascade');
            \$table->string('reference')->unique();
            \$table->decimal('montant', 15, 2);
            \$table->date('date_echeance')->nullable();
            \$table->string('statut')->default('non_paye');
            \$table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('factures');
    }
};";
        file_put_contents("$dir/$file", $content);
    }

    if (strpos($file, 'create_paiements_table') !== false) {
        $content = "<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('paiements', function (Blueprint \$table) {
            \$table->id();
            \$table->foreignId('facture_id')->constrained()->onDelete('cascade');
            \$table->decimal('montant', 15, 2);
            \$table->date('date_paiement');
            \$table->string('methode')->nullable();
            \$table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('paiements');
    }
};";
        file_put_contents("$dir/$file", $content);
    }

    if (strpos($file, 'create_approvals_table') !== false) {
        $content = "<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('approvals', function (Blueprint \$table) {
            \$table->id();
            \$table->foreignId('demande_id')->constrained()->onDelete('cascade');
            \$table->integer('niveau');
            \$table->foreignId('validateur_id')->constrained('users')->onDelete('cascade');
            \$table->string('statut')->default('en_attente');
            \$table->text('commentaire')->nullable();
            \$table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('approvals');
    }
};";
        file_put_contents("$dir/$file", $content);
    }

    if (strpos($file, 'create_notifications_table') !== false) {
        $content = "<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('notifications', function (Blueprint \$table) {
            \$table->id();
            \$table->foreignId('user_id')->constrained()->onDelete('cascade');
            \$table->string('message');
            \$table->string('lien')->nullable();
            \$table->boolean('lu')->default(false);
            \$table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('notifications');
    }
};";
        file_put_contents("$dir/$file", $content);
    }

    if (strpos($file, 'create_audit_logs_table') !== false) {
        $content = "<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('audit_logs', function (Blueprint \$table) {
            \$table->id();
            \$table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            \$table->string('action');
            \$table->string('module');
            \$table->json('before')->nullable();
            \$table->json('after')->nullable();
            \$table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('audit_logs');
    }
};";
        file_put_contents("$dir/$file", $content);
    }
}

echo "Migations generated.\n";

