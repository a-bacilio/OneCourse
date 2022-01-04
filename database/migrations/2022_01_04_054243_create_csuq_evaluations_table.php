<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCsuqEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('csuq_evaluations', function (Blueprint $table) {
            $table->id();

            $table->integer('csuq1');
            $table->integer('csuq2');
            $table->integer('csuq3');
            $table->integer('csuq4');
            $table->integer('csuq5');
            $table->integer('csuq6');
            $table->integer('csuq7');
            $table->integer('csuq8');
            $table->integer('csuq9');
            $table->integer('csuq10');
            $table->integer('csuq11');
            $table->integer('csuq12');
            $table->integer('csuq13');
            $table->integer('csuq14');
            $table->integer('csuq15');
            $table->integer('csuq16');
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
        Schema::dropIfExists('csuq_evaluations');
    }
}
