<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
     
    public function up(): void
    { 
        Schema::create('hikes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('img_path');
            $table->string('location');
            $table->integer('views')->default(0);  
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }
 
    public function down(): void
    {
        Schema::dropIfExists('hikes');
    }
};
