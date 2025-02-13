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
            $table->foreignId('avis_id')->constrained('avis')->onDelete('cascade');
            $table->foreignId('suggestion_id')->constrained('suggestions')->onDelete('cascade');
            $table->primary(['avis_id', 'suggestion_id']);
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
