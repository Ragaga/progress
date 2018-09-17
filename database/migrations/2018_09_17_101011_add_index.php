<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIndex extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table){
            $table->index(['surname']);
            $table->index(['group_id']);
            $table->index(['registration_ip']);
            $table->index(['advisor_review']);
        });

        Schema::table('grades', function (Blueprint $table){
            $table->index(['grade']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table){
            $table->dropIndex(['surname']);
            $table->dropIndex(['group_id']);
            $table->dropIndex(['registration_ip']);
            $table->dropIndex(['advisor_review']);
        });

        Schema::table('grades', function (Blueprint $table){
            $table->dropIndex(['grade']);
        });
    }
}
