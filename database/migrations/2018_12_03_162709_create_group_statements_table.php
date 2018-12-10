<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupStatementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_statements', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger("objective_id",false, true);
            $table->foreign('objective_id')->references('id')->on('objectives')->onDelete('cascade');
            $table->unsignedInteger("level_id",false, true);
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
            $table->text('first_lang_statement');
            $table->text('second_lang_statement');
            $table->integer('pre_requisite');
            $table->integer('require_points');
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
        Schema::dropIfExists('group_statements');
    }
}
