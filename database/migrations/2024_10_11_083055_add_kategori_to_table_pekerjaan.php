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
        Schema::table('table_pekerjaan', function (Blueprint $table) {
            $table->enum('kategori', ['Agrikultur','Akuntansi','Edukasi','Kesehatan','Lingkungan','Kreatif','Finance','Teknologi','Sosial','Lainnya'])->default('Lainnya')->after('tempat_bekerja');
        });
    }
    public function down(): void
    {
        Schema::table('table_pekerjaan', function (Blueprint $table) {
            $table->dropColumn('kategori');
        });
    }
};
