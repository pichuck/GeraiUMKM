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
        Schema::create('table_chat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_sender');
            $table->unsignedBigInteger('id_receiver');
            $table->foreign('id_sender')->references('id')->on('users');
            $table->foreign('id_receiver')->references('id')->on('users');
            $table->string('pesan')->nullable();
            $table->datetime('tanggal');
            $table->boolean('is_read')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_chat');
    }
};
