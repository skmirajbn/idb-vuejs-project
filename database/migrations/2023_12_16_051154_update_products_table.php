<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('price');
            $table->dropColumn('stock');
            $table->dropColumn('variants');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('price', 8, 2);
            $table->integer('stock');
            $table->json('variants');
        });
    }
};
