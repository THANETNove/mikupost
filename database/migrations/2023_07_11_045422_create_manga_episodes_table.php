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
        Schema::create('manga_episodes', function (Blueprint $table) {
            $table->id();
            $table->string('mangesId')->nullable();
            $table->string('episodeId')->nullable();
            $table->string('episode_name')->nullable();
            $table->string('episode_name_image')->nullable();
            $table->string('foldedManges')->nullable();
            $table->timestamps();
        });
    }
   
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manga_episodes');
    }
};