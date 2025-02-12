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
        Schema::create('stratégie', function (Blueprint $table) {
            $table->id();
            $table->foreignId('joueur_id')->constrained('joueur')->onDelete('cascade');
            $table->string('title');
            $table->text('content');
            $table->integer('vue');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stratégie');
    }
};
