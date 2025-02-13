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
        Schema::create('avis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('randonnee_id');
            $table->text('contenu');
            $table->integer('vues')->default(0);
            $table->integer('positif')->default(0); // Pour gérer le comptage des avis positifs
            $table->timestamps();

            $table->foreign('randonnee_id')->references('id')->on('randonnees')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avis');
    }
};
