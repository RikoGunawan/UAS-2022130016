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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relasi ke tabel Users
            $table->foreignId('session_id')->constrained()->onDelete('cascade'); // Relasi ke tabel Sessions
            $table->decimal('amount', 10, 2)->unsigned(); // Jumlah pembayaran (max 999999.99)
            $table->enum('status', ['pending', 'completed', 'failed'])->default('pending'); // Status pembayaran
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
