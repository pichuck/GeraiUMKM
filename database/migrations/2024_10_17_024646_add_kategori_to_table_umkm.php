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
            if (Schema::hasColumn('table_umkm', 'kategori')) {
                $table->dropColumn('kategori');
            }
            // Now, add the 'kategori' column as an enum type with specified options
            $table->enum('kategori', [
                'F&B',
                'Retail',
                'Jasa',
                'Produksi',
                'Pendidikan',
                'Kesehatan dan Kecantikan',
                'Teknologi dan Digital',
                'Pariwisata dan Hospitality',
                'Agribisnis',
                'Kesenian dan Hiburan',
                'Lainnya'
            ])->after('nama_umkm');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('table_umkm', function (Blueprint $table) {
            $table->dropColumn('kategori');
        });
    }

    
};
