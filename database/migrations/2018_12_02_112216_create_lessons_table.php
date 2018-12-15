<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('unit_id')->unsigned();
            $table->string('title');
            $table->string('slug');
            $table->integer('order')->unsigned();
            $table->enum('type', ['video', 'reading', 'practice']);
            $table->text('description')->nullable();
            $table->text('objectives')->nullable();
            $table->string('poster')->nullable();
            $table->string('path')->nullable();
            $table->string('duration')->nullable();
            $table->string('lang')->default('en');
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
        Schema::dropIfExists('lessons');
    }
}
