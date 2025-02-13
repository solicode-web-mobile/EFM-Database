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
        Schema::table('suggestions', function (Blueprint $table) {
            // Add the suggestion_id column
            $table->unsignedBigInteger('suggestion_id')->nullable();

            // Add foreign key constraint (if necessary)
            $table->foreign('suggestion_id')->references('id')->on('suggestions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('suggestions', function (Blueprint $table) {
            $table->dropForeign(['suggestion_id']);
            $table->dropColumn('suggestion_id');
        });
    }
};
