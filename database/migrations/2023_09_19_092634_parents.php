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
        Schema::create('parents', function(Blueprint $table){
            $table->id();
            $table->string('parent_guardian_name');
            $table->string('student_fullname');
            $table->bigInteger('phone')->unique();
            $table->string('parent_email')->unique();
            $table->bigInteger('parent_id_no')->unique();
            $table->string('occupation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('parents');
    }
};
