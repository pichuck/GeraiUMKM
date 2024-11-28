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
            if (!Schema::hasColumn('table_apply', 'status')) {
            $table->enum('status', ['pending', 'accepted', 'rejected', 'active', 'completed'])->default('pending');
            } else {
            $table->enum('status', ['pending', 'accepted', 'rejected', 'active', 'completed'])->default('pending')->change();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('table_apply', function (Blueprint $table) {
            //
        });
    }
};
