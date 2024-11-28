<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('table_pekerjaan', function (Blueprint $table) {
            // Dapatkan semua enum yang sudah ada dan tambahkan 'Marketing'
            $types = ['Agrikultur', 'Akuntansi', 'Edukasi', 'Kesehatan', 'Lingkungan', 'Kreatif', 'Finance', 'Teknologi', 'Sosial', 'Lainnya', 'Marketing'];

            // Re-define the column with the new set of enums
            DB::statement("ALTER TABLE table_pekerjaan MODIFY COLUMN kategori ENUM('" . join("', '", $types) . "') DEFAULT 'Lainnya'");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('table_pekerjaan', function (Blueprint $table) {
            // Dapatkan semua enum tanpa 'Marketing'
            $types = ['Agrikultur', 'Akuntansi', 'Edukasi', 'Kesehatan', 'Lingkungan', 'Kreatif', 'Finance', 'Teknologi', 'Sosial', 'Lainnya'];

            // Re-define the column to the original set of enums
            DB::statement("ALTER TABLE table_pekerjaan MODIFY COLUMN kategori ENUM('" . join("', '", $types) . "') DEFAULT 'Lainnya'");
        });
    }
};
