<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('contacts', function (Blueprint $table) {
        $table->id();
        $table->string('nom');
        $table->string('prenom')->nullable();
        $table->string('email');
        $table->string('ligne')->nullable(); // sujet
        $table->text('message')->nullable();
        $table->ipAddress('ip')->nullable(); // pour sécurité
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
