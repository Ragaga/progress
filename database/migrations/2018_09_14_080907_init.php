<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Init extends Migration
{
    public $timestamps = false;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });
        Schema::create('subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('surname');
            $table->string('email');
            $table->string('birthdate');
            $table->integer('group_id');
            $table->text('advisor_review')->nullable();
            $table->string('registration_ip');
            $table->dateTime('registration_time');
            $table->foreign('group_id')
                ->references('id')
                ->on('groups')
                ->onDelete('cascade');
        });
        Schema::create('grades', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subject_id');
            $table->integer('student_id');
            $table->integer('grade');
            $table->dateTime('date');
            $table->foreign('subject_id')
                ->references('id')
                ->on('subjects')
                ->onDelete('restrict');
            $table->foreign('student_id')
                ->references('id')
                ->on('students')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('grades');
        Schema::drop('students');
        Schema::drop('groups');
        Schema::drop('subjects');
    }
}
