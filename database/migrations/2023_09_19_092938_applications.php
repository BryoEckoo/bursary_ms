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
        //
        Schema::create('applications', function(Blueprint $table){
            $table->id();
            $table->string('reference_number');
            $table->string('student_fullname');
            $table->string('adm_upi_reg_no');
            $table->string('school_type');
            $table->string('school_name');
            $table->string('location');
            $table->string('status');
            $table->string('bank_name');
            $table->bigInteger('account_no');
            $table->date('today_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
