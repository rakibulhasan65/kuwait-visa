<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('visas', function (Blueprint $table) {
        $table->id();
        $table->string('visa_number');
        $table->string('visa_type_en');
        $table->string('visa_purpose');
        $table->string('place_of_issue');
        $table->string('visa_type_ar');
        $table->date('issue_date');
        $table->date('expiry_date');
        $table->string('full_name_ar');
        $table->string('full_name_en');
        $table->string('moi_reference')->nullable();
        $table->string('nationality_en');
        $table->string('nationality_ar');
        $table->string('gender');
        $table->string('gender_ar');
        $table->string('occupation_ar');
        $table->string('occupation_en');
        $table->date('dob');
        $table->string('passport_no');
        $table->string('passport_issue_date');
        $table->string('passport_expiry_date');
        $table->string('company_name_ar');
        $table->string('passport_type_ar');
        $table->string('barcode_text_up');
        $table->string('barcode_text_down');
        $table->string('passport_issue_place');
        $table->string('passport_type_en');
        $table->string('visa_status')->default('approved');
        $table->string('phone_number');
        $table->text('barcode');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visas');
    }
};