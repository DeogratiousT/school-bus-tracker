<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPupilDetailsToPupilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pupils', function (Blueprint $table) {
            $table->string('gender');
            $table->integer('age');
            $table->string('disabilities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pupils', function (Blueprint $table) {
            //
        });
    }
}
