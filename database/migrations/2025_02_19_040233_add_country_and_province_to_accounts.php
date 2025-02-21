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
        Schema::table('accounts', function (Blueprint $table) {
            $table->string('country')->nullable()->after('postal_code');
            $table->string('province')->nullable()->after('country');
        });

        // Pindahkan city setelah province
        Schema::table('accounts', function (Blueprint $table) {
            $table->string('city')->nullable()->after('province')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->dropColumn(['country', 'province']);
        });
    }
};