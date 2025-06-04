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
        Schema::table('cryptos', function (Blueprint $table) {
            $table->decimal('current_price', 16, 8)->nullable();
            $table->decimal('price_change_percentage_24h', 8, 4)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cryptos', function (Blueprint $table) {
            $table->dropColumn(['current_price', 'price_change_percentage_24h']);
        });
    }
};
