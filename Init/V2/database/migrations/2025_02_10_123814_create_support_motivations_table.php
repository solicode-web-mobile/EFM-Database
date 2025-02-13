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
        Schema::create('support_motivations', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->foreignId('image_id')->constrained('image_motivations')->onDelete('cascade');
            $table->integer('views')->default(0);
            $table->integer('reactions')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('support_motivations');
    }
};
