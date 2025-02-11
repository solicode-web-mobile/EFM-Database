<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('strategies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('player_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('content');
            $table->integer('vue')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('strategies');
    }
};
