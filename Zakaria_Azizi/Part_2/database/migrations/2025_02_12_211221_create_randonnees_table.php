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
        Schema::create('randonnees', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->unsignedBigInteger('membre_id')->unique(); // Un seul membre par randonnée
            $table->integer('vues')->default(0);
            $table->timestamps();

            $table->foreign('membre_id')->references('id')->on('membres')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('randonnees');
    }
};
