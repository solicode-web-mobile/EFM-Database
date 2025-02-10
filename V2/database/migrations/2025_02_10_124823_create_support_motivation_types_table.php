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
        Schema::create('support_motivation_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId('support_motivation_id')->constrained('support_motivations')->onDelete('cascade');
            $table->foreignId('type_motivation_id')->constrained('type_motivations')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('support_motivation_types');
    }
};
