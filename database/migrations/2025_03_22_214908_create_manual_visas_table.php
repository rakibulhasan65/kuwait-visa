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
        Schema::create('manual_visas', function (Blueprint $table) {
            $table->id();
            $table->string('passport_no')->unique();
            $table->date('dob');
            $table->string('nationality_en');
            $table->string('file_owner_name'); // Store the file path
            $table->string('pdf_file'); // Store the file path
            $table->string('status')->default('approved'); // Store the file path
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manual_visas');
    }
};