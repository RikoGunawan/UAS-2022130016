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
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relasi ke tabel Users
            $table->foreignId('computer_id')->constrained()->onDelete('cascade'); // Relasi ke tabel Computers
            $table->timestamp('start_time'); // Waktu mulai
            $table->timestamp('end_time')->nullable(); // Waktu selesai (nullable)
            $table->enum('status', ['ongoing', 'completed', 'cancelled'])->default('ongoing'); // Status sesi
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};
