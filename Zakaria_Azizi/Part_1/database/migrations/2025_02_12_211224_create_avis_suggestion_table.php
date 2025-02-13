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
        Schema::create('avis_suggestion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('avis_id');
            $table->unsignedBigInteger('suggestion_id');
            $table->timestamps();

            $table->foreign('avis_id')->references('id')->on('avis')->onDelete('cascade');
            $table->foreign('suggestion_id')->references('id')->on('suggestions')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avis_suggestion');
    }
};
