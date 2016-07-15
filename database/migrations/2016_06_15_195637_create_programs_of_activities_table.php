<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramsOfActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs_of_activities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('filepath');
            $table->integer('school');
            $table->integer('company_category');
            $table->integer('lang');
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
        Schema::drop('programs_of_activities');
    }
}
