<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Type\Integer;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('students', function(Blueprint $table){
            $table->id();
            $table->string('firstname');
            $table->string('secondname');
            $table->string('student_fullname');
            $table->integer('age');
            $table->string('gender');
            $table->string('family_status');
            $table->string('parent_guardian_name');
            $table->bigInteger('phone')->unique();
            $table->string('parent_email')->unique();
            $table->bigInteger('parent_id_no')->unique();
            $table->string('occupation');
            $table->string('county');
            $table->string('ward');
            $table->string('location');
            $table->string('school_level');
            $table->string('adm/upi/reg_no');
            $table->string('school_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('students');
    }
};
