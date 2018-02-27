<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('fathername');
            $table->string('gender');
            $table->string('age');
            $table->string('dob');
            $table->string('cnic');
            $table->string('address');
            $table->string('email');
            $table->string('dpt');
            $table->string('cgpa');
            $table->string('fee_status');
            $table->string('library_status');
            $table->string('shift');
            $table->string('username')->unique();
            $table->string('password');
            $table->rememberToken();
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
        //
    }
}
