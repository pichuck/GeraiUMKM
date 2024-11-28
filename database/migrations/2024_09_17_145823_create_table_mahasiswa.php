<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('table_mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->string('nama_mahasiswa');
            $table->string('universitas');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('no_hp');
            $table->string('penghasilan');
            $table->string('pekerjaan');
            $table->string('foto_profil');
            $table->string('provinsi_mahasiswa');
            $table->string('kota_mahasiswa');
            $table->string('kecamatan_mahasiswa');
            $table->string('kelurahan_mahasiswa')->nullable();
            $table->string('kode_pos');
            $table->string('alamat_mahasiswa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_mahasiswa');
    }
};
