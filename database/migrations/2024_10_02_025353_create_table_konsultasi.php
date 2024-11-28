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
        Schema::create('table_konsultasi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->enum('status_aktivitas_bisnis', ['aktif', 'tidak_aktif', 'Belum'])->default('aktif');
            $table->string('nama_pelaku_bisnis');
            $table->enum('tipe_identitas',['NPWP','NIK','NIB'])->default('NIK');
            $table->string('email');
            $table->string('alamat');
            $table->string('provinsi');
            $table->string('kota');
            $table->string('detail_kendala_bisnis');
            $table->string('kendala_bisnis');
            $table->string('kategori_kebutuhan');
            $table->string('deskripsi_masalah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_konsultasi');
    }
};
