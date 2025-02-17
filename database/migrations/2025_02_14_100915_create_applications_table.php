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
    Schema::table('applications', function (Blueprint $table) {
        $table->string('poste');
        $table->string('societe');
        $table->string('candidate_name');
        $table->date('date_of_birth');
        $table->string('nationality');
        $table->string('education');
        $table->string('experience');
        $table->string('languages');
        $table->string('projects');
        $table->string('id_card');
        $table->string('diplomas');
        $table->string('certificates');
        $table->string('cv');
    });

}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
