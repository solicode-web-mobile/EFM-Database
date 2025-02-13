<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // Example migration for suggestions table
public function up()
{
    Schema::create('suggestions', function (Blueprint $table) {
        $table->id();
        $table->text('content');
        $table->foreignId('review_id')->constrained('reviews'); // Foreign key to the reviews table
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suggestions');
    }
};
