<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBehaviorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('behaviors', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger("statement_id");
            $table->foreign('statement_id')->references('id')->on('group_statements')->onDelete('cascade');
            $table->text('first_lang_behavior');
            $table->text('second_lang_behavior');
            $table->integer('max_self')->unsigned();
            $table->integer('max_peer')->unsigned();
            $table->integer('max_mentor')->unsigned();

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
        Schema::dropIfExists('behaviors');
    }
}
