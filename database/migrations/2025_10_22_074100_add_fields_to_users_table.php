<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // ✅ Infos personnelles
            $table->string('prenom')->nullable()->after('name');
            $table->string('telephone')->nullable()->after('prenom');
            $table->string('adresse')->nullable()->after('telephone');
            $table->string('code_postal')->nullable()->after('adresse');
            $table->string('ville')->nullable()->after('code_postal');

            // ✅ Rôle et dernière connexion
            $table->string('role')->default('user')->after('email');
            $table->timestamp('last_login_at')->nullable()->after('remember_token');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'prenom',
                'telephone',
                'adresse',
                'code_postal',
                'ville',
                'role',
                'last_login_at'
            ]);
        });
    }
};
