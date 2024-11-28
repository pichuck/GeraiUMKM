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
        Schema::create('table_achievement', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('apply_id');
            $table->text('deskripsi');
            $table->timestamps();
            $table->foreign('apply_id')->references('id')->on('table_apply')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_achievement');
    }
};
