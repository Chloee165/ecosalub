<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachinesGlaceSecheTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Main table for Machines à Glace Sèche
        Schema::create('machines_glace_seche', function (Blueprint $table) {
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

        // Images table for Machines à Glace Sèche
        Schema::create('machine_glace_seche_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('machine_glace_seche_id')->constrained('machines_glace_seche')->onDelete('cascade');
            $table->string('image_path')->default('img-a-venir.png'); 
            $table->timestamps();
        });

        // Documents table for Machines à Glace Sèche
        Schema::create('machine_glace_seche_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('machine_glace_seche_id')->constrained('machines_glace_seche')->onDelete('cascade');
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
        Schema::dropIfExists('machine_glace_seche_documents');
        Schema::dropIfExists('machine_glace_seche_images');
        Schema::dropIfExists('machines_glace_seche');
    }
}
