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
        Schema::table('ad_s', function (Blueprint $table) {
            $table->integer('ad_type')->default(0)->after('ad_position');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ad_s', function (Blueprint $table) {
            $table->dropForeign(['ad_type']);
        });
    }
};
