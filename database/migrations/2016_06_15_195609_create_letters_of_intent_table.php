<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLettersOfIntentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('letters_of_intent', function (Blueprint $table) {
            $table->increments('id');
            $table->string('school_id');
            $table->text('content');
            $table->text('comments');
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
        Schema::drop('letters_of_intent');
    }
}
