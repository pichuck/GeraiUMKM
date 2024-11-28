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
        Schema::create('table_comment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->integer('id_artikel')->foreign('id_artikel')->references('id')->on('table_artikel');
            // $table->integer('id_mahasiswa')->foreign('id_mahasiswa')->references('id')->on('table_mahasiswa');
            $table->foreign('id_user')->references('id')->on('users');
            $table->string('komentar');
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_comment');
    }
};
