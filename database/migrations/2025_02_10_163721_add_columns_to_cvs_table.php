<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::table('cvs', function (Blueprint $table) {
        $table->string('nom');
        $table->string('prenoms');
        $table->string('email')->unique();
        $table->string('genre');
        $table->string('adresse');
        $table->string('domaine');
        $table->string('sous_domaine');
        $table->string('file_path')->nullable(); // Si tu veux enregistrer le fichier téléchargé
    });
}

public function down(): void
{
    Schema::table('cvs', function (Blueprint $table) {
        $table->dropColumn([
            'nom',
            'prenoms',
            'email',
            'genre',
            'adresse',
            'domaine',
            'sous_domaine',
            'file_path',
        ]);
    });
}

};
