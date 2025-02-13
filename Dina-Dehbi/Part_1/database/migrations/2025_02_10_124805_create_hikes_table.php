<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;'); // Disable foreign key checks

        Schema::create('hikes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('views');
            $table->string('image');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });

        DB::statement('SET FOREIGN_KEY_CHECKS=1;'); // Re-enable foreign key checks
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;'); // Disable foreign key checks
        Schema::dropIfExists('hikes');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;'); // Re-enable foreign key checks
    }
};
