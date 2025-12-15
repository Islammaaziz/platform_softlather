<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projets', function (Blueprint $table) {
            $table->id(); 
            $table->string('nom_projet'); 
            $table->string('ref_interne')->nullable(); 
            $table->string('adresse'); 
            $table->string('cp', 10); 
            $table->string('ville'); 
            $table->timestamps(); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projets');
    }
};
