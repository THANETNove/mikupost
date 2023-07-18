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
        Schema::create('mangas', function (Blueprint $table) {
            $table->id();
            $table->string('cover_photo')->nullable();
            $table->string('manga_name')->nullable();
            $table->string('manga_details')->nullable();
            $table->string('author')->nullable();
            $table->string('artist')->nullable();
            $table->string('status')->nullable();
            $table->json('categories_id')->nullable();
            $table->string('views')->nullable();
            $table->string('website')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mangas');
    }
};