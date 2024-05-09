<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name_english');
            $table->string('name_arabic');
            $table->string('email');
            $table->string('password');
            $table->foreignId('grade_id')->constrained('grades'); 
            $table->foreignId('national_id')->constrained('nationalities'); 
            $table->foreignId('gov_id')->constrained('governrates'); 
            $table->foreignId('spec_id')->constrained('specilizations'); 
            $table->foreignId('gender_id')->constrained('genders'); 
            $table->string('photo')->nullable();
            $table->date('Joining_Date');
            $table->string('address');
            $table->string('nationalid');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
