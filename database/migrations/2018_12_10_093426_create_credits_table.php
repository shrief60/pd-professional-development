<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credits', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger("for_id",false, true);
            $table->foreign('for_id')->references('id')->on('learners')->onDelete('cascade');
            $table->unsignedInteger("from_id",false, true);
            $table->foreign('from_id')->references('id')->on('learners')->onDelete('cascade');
            $table->unsignedInteger("behavior_id",false, true);
            $table->foreign('behavior_id')->references('id')->on('behaviors')->onDelete('cascade');
            $table->integer('credit_type');
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
        Schema::dropIfExists('credits');
    }
}
