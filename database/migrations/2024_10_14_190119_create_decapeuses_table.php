<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDecapeusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('decapeuses', function (Blueprint $table) {
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

        Schema::create('decapeuse_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('decapeuse_id')->constrained('decapeuses')->onDelete('cascade');
            $table->string('image_path')->default('img-a-venir.png'); 
            $table->timestamps();
        });

        Schema::create('decapeuse_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('decapeuse_id')->constrained('decapeuses')->onDelete('cascade');
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
        Schema::dropIfExists('decapeuse_documents');
        Schema::dropIfExists('decapeuse_images');
        Schema::dropIfExists('decapeuses');
    }
}
