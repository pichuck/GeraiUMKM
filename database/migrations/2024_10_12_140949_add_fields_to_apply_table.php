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
        Schema::table('table_apply', function (Blueprint $table) {
            $table->string('nama');
            $table->text('deskripsi_diri');
            $table->string('jurusan');
            $table->text('pengalaman_organisasi');
            $table->text('pengalaman_kerja');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('table_apply', function (Blueprint $table) {
            $table->dropColumn(['nama', 'deskripsi_diri', 'jurusan', 'pengalaman_organisasi', 'pengalaman_kerja']);
        });
    }
};
