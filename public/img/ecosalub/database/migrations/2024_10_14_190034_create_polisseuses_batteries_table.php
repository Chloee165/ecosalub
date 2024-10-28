<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePolisseusesBatteriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polisseuses_batteries', function (Blueprint $table) {
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

        Schema::create('polisseuse_batterie_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('polisseuse_batterie_id')
                ->constrained('polisseuses_batteries')
                ->onDelete('cascade');
            $table->string('image_path')->default('img-a-venir.png');
            $table->timestamps();
        });

        Schema::create('polisseuse_batterie_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('polisseuse_batterie_id')
                ->constrained('polisseuses_batteries')
                ->onDelete('cascade');
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
        Schema::dropIfExists('polisseuse_batterie_documents');
        Schema::dropIfExists('polisseuse_batterie_images');
        Schema::dropIfExists('polisseuses_batteries');
    }
}
