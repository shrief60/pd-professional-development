<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvidencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evidences', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger("for_id",false, true);
            $table->foreign('for_id')->references('id')->on('learners')->onDelete('cascade');
            $table->unsignedInteger("credit_id",false, true);
            $table->foreign('credit_id')->references('id')->on('credits')->onDelete('cascade');
            $table->string('name', 300);
            $table->string('link', 300);
            $table->string('type', 300);
            $table->text('description')->nullable() ;
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
        Schema::dropIfExists('evidences');
    }
}
