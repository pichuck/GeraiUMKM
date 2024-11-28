<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('ch_messages', function (Blueprint $table) {
            $table->boolean('is_deleted')->default(false);
        });
    }

    public function down()
    {
        Schema::table('ch_messages', function (Blueprint $table) {
            $table->dropColumn('is_deleted');
        });
    }
};
