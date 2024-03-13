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
        Schema::create('cancion_playlist', function (Blueprint $table) {
            $table->id();
            $table->foreignId('playlist_id')->references('id')->on('playlists')->onDelete('cascade');
            $table->foreignId('cancion_id')->references('id')->on('canciones')->onDelete('cascade');
            $table->timestamps();

            $table->unique(['playlist_id', 'cancion_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cancion_playlist');
    }
};