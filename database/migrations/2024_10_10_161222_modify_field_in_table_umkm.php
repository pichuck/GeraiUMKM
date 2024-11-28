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
        Schema::table('table_umkm', function (Blueprint $table) {
            $table->string('kategori')->nullable()->change();
            $table->string('foto_profil')->nullable()->change();
            $table->dropColumn('foto_sampul');
            $table->string('provinsi')->nullable()->change();
            $table->string('kecamatan')->nullable()->change();
            $table->string('kota')->nullable()->change();
            $table->string('kode_pos')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('table_umkm', function (Blueprint $table) {
            // Kembalikan kolom yang diubah menjadi non-nullable
            $table->string('kategori')->nullable(false)->change();
            $table->string('foto_profil')->nullable(false)->change();
            $table->string('provinsi')->nullable(false)->change();
            $table->string('kecamatan')->nullable(false)->change();
            $table->string('kota')->nullable(false)->change();
            $table->string('kode_pos')->nullable(false)->change();

            // Tambahkan kembali kolom yang dihapus
            $table->string('foto_sampul')->nullable(); // Atau sesuaikan dengan tipe data yang sesuai
        });
    }
};
