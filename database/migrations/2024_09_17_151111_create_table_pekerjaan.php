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
        Schema::create('table_pekerjaan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            // $table->integer('id_umkm')->foreign('id_umkm')->references('id')->on('table_umkm');
            $table->foreign('id_user')->references('id')->on('users');
            $table->string('posisi');
            $table->string('deskripsi');
            $table->string('tanggal');
            $table->string('tempat_bekerja');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_pekerjaan');
    }
};
