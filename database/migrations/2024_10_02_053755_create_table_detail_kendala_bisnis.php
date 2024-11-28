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
        Schema::create('table_detail_kendala_bisnis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_kendala_id')->constrained('table_jenis_kendala_bisnis');
            $table->string("kriteria");
            $table->string("nilai");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_detail_kendala_bisnis');
    }
};
