<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonneesTechniquesTable extends Migration
{
    public function up()
    {
        Schema::create('donnees_techniques', function (Blueprint $table) {
            $table->id();
            $table->foreignId('projet_id')->constrained('projets')->onDelete('cascade'); // lien avec projets
            $table->float('surface')->nullable();
            $table->float('debit_fuite')->nullable();
            $table->string('zone')->nullable();
            $table->integer('periode')->nullable();
            $table->string('nature')->nullable();
            $table->float('surface_active')->nullable();
            $table->timestamps();
            $table->string('typeSpecifique')->nullable();
            $table->float('coefRuiss')->nullable();
            $table->float('Hauteur_equivalente')->nullable();
            $table->float('Hauteur_specifique_stockage')->nullable();
            $table->float('volume')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('donnees_techniques');
    }
}
