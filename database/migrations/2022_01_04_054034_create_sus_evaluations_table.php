<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSusEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sus_evaluations', function (Blueprint $table) {
            $table->id();

            $table->integer('sus1');
            $table->integer('sus2');
            $table->integer('sus3');
            $table->integer('sus4');
            $table->integer('sus5');
            $table->integer('sus6');
            $table->integer('sus7');
            $table->integer('sus8');
            $table->integer('sus9');
            $table->integer('sus10');

            $table->unsignedBigInteger('user_id');
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");

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
        Schema::dropIfExists('sus_evaluations');
    }
}
