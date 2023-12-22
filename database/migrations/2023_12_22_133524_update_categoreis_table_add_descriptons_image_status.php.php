<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::table('categories', function (Blueprint $table) {
            // add new columns
            $table->string('description')->nullable()->after('name');
            $table->string('image')->nullable()->after('description');
            $table->string('status')->nullable()->after('image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::table('categories', function (Blueprint $table) {
            // drop columns
            $table->dropColumn('description');
            $table->dropColumn('image');
            $table->dropColumn('status');
        });
    }
};
