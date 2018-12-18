<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progresses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('learner_id');
            $table->foreign('learner_id')->references('id')->on('learners')->onDelete('cascade');
            $table->unsignedInteger('statement_id');
            $table->foreign('statement_id')->references('id')->on('group_statements')->onDelete('cascade');
            $table->unsignedInteger('track_id');
            $table->foreign('track_id')->references('id')->on('tracks')->onDelete('cascade');
            $table->unsignedInteger('behavior_id');
            $table->foreign('behavior_id')->references('id')->on('behaviors')->onDelete('cascade');
            $table->double('max_self')->unsigned();
            $table->double('max_peer')->unsigned();
            $table->double('max_mentor')->unsigned();
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
        Schema::dropIfExists('progresses');
    }
}
