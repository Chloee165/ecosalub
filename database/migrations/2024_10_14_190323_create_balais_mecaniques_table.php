<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalaisMecaniquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Main table for Balais Mécaniques
        Schema::create('balais_mecaniques', function (Blueprint $table) {
            $table->id();
            $table->string('marque');
            $table->string('modele');
            $table->text('description')->nullable();
            $table->string('largeur_plateau_nettoyage')->nullable();
            $table->string('largeur_tampons')->nullable();
            $table->string('galonnage')->nullable();
            $table->string('superficie_nettoyage')->nullable();
            $table->string('prix', 10)->nullable();
            $table->timestamps();
        });

        // Images table for Balais Mécaniques
        Schema::create('balai_mecanique_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('balai_mecanique_id')->constrained('balais_mecaniques')->onDelete('cascade');
            $table->string('image_path')->default('img-a-venir.png'); 
            $table->timestamps();
        });

        // Documents table for Balais Mécaniques
        Schema::create('balai_mecanique_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('balai_mecanique_id')->constrained('balais_mecaniques')->onDelete('cascade');
            $table->string('document_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('balai_mecanique_documents');
        Schema::dropIfExists('balai_mecanique_images');
        Schema::dropIfExists('balais_mecaniques');
    }
}
