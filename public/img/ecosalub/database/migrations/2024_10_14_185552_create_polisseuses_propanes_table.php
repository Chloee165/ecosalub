<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePolisseusesPropanesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polisseuses_propanes', function (Blueprint $table) {
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

        Schema::create('polisseuse_propane_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('polisseuse_propane_id')->constrained('polisseuses_propanes')->onDelete('cascade');
            $table->string('image_path')->default('img-a-venir.png'); 
            $table->timestamps();
        });

        Schema::create('polisseuse_propane_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('polisseuse_propane_id')->constrained('polisseuses_propanes')->onDelete('cascade');
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
        // Drop in reverse order
        Schema::dropIfExists('polisseuse_propane_documents');
        Schema::dropIfExists('polisseuse_propane_images');
        Schema::dropIfExists('polisseuses_propanes');
    }
}
