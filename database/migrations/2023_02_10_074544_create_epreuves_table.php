<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('epreuves', function (Blueprint $table) {
             $table->id();
        $table->timestamps();
        $table->enum('session', ['cc','normale']);
        $table->string('titre');
        $table->string('fichier');
        $table->enum('semestre', ['1', '2']);
        $table->integer('annee')->nullable();
        $table->foreignId('matiere_id')->constrained();
        $table->foreignId('user_id')->constrained();
        $table->foreignId('filiere_id')->constrained(); // Ajout de la relation avec la table filieres
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('epreuves');
    }
};
