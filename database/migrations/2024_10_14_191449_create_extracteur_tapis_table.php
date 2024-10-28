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
        Schema::create('extracteur_tapis', function (Blueprint $table) {
            $table->id();
            $table->string('marque');
            $table->string('modele');
            $table->text('description')->nullable();
            $table->string('largeur_plateau_nettoyage')->nullable(); // Nullable
            $table->string('largeur_tampons')->nullable(); // Nullable
            $table->string('galonnage')->nullable(); // Nullable
            $table->string('superficie_nettoyage')->nullable();
            $table->string('prix', 10)->nullable();
            $table->timestamps();
        });

        Schema::create('extracteur_tapis_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('extracteur_tapis_id')->constrained('extracteur_tapis')->onDelete('cascade');
            $table->string('image_path')->default('img-a-venir.png'); 
            $table->timestamps();
        });

        Schema::create('extracteur_tapis_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('extracteur_tapis_id')->constrained('extracteur_tapis')->onDelete('cascade');
            $table->string('document_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('extracteur_tapis_documents');
        Schema::dropIfExists('extracteur_tapis_images');
        Schema::dropIfExists('extracteur_tapis');
    }
};
