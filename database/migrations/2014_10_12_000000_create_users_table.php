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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('telephone')->nullable();
            $table->string('adresse')->nullable();
            $table->string('nom');
            $table->string('prenom');
            $table->date('date_de_naissance')->nullable();
            $table->enum('genre', ['masculin', 'feminin'])->default('masculin');
            $table->string('matricule')->nullable(); //propre etudiant
            $table->enum('civiliter', ['Mr', 'Mme', 'Dr', 'Pr'])->nullable(); //propre a l'enseignent

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
