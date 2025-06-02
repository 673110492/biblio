<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cours', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('titre');
            $table->string('fichier');
            $table->string('image')->nullable(); // Image associée au cours
            $table->string('proprietaire')->nullable(); // Propriétaire (nom ou autre)
            $table->text('description')->nullable();
            $table->enum('semestre', ['1', '2']);

            // Clés étrangères
            $table->foreignId('matiere_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('filiere_id')->constrained()->onDelete('cascade'); // Ajout de la filière
        });
    }

    public function down()
    {
        Schema::dropIfExists('cours');
    }
};
