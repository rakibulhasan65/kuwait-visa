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
    Schema::table('visas', function (Blueprint $table) {
        // Check if the column exists before modifying or adding it
        if (!Schema::hasColumn('visas', 'visa_status')) {
            $table->string('visa_status')->default('pending'); // Add column if it doesn't exist
        } else {
            $table->string('visa_status')->default('pending')->change(); // Modify column if it exists
        }
    });
}

public function down(): void
{
    Schema::table('visas', function (Blueprint $table) {
        // You can modify this to revert the column back to its old state if needed
        if (Schema::hasColumn('visas', 'visa_status')) {
            $table->string('visa_status')->default('old_default_value')->change();
        }
    });
}
};