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
        Schema::create('pricings', function (Blueprint $table) {
            $table->id();
            $table->string('plan_name', 100); // Nama paket (contoh: "1 Hour", "Daily Pass")
            $table->decimal('price', 10, 2)->unsigned(); // Harga (contoh: 999999.99)
            $table->integer('duration_minutes')->unsigned(); // Durasi dalam menit (contoh: 60, 1440)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pricings');
    }
};
