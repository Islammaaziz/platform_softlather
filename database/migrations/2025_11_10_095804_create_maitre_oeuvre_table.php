<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaitreOeuvreTable extends Migration
{
    public function up()
    {
        Schema::create('maitre_oeuvre', function (Blueprint $table) {
            $table->id();
            $table->foreignId('projet_id')->constrained('projets')->onDelete('cascade');
            $table->string('nom');
            $table->string('prenom');
            $table->string('adresse')->nullable();
            $table->string('cp')->nullable();
            $table->string('ville')->nullable();
            $table->string('telephone')->nullable();
            $table->string('numero')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('maitre_oeuvre');
    }
}
