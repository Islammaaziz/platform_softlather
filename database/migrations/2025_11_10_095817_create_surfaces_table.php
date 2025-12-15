<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurfacesTable extends Migration
{
    public function up()
    {
        Schema::create('surfaces', function (Blueprint $table) {
            $table->id();
            $table->foreignId('donnees_techniques_id')->constrained('donnees_techniques')->onDelete('cascade');
            $table->string('type');
            $table->float('surface'); 
             $table->float('surface_active');
            $table->string('typeSpecifique');        
            $table->float('coef_c')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('surfaces');
    }
}
