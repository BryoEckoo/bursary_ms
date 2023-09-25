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
            $table->string('adm/upi/reg_no');
            $table->string('school_type');
            $table->string('school_name');
            $table->string('location');
            $table->string('status');
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
