<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourceLesson extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource_lesson', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('resource_id');
            $table->foreign("resource_id")->references("id")->on("resources")->onDelete("cascade");
            $table->unsignedBigInteger('lesson_id');
            $table->foreign("lesson_id")->references("id")->on("lessons")->onDelete("cascade");


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
        Schema::dropIfExists('resource_lesson');
    }
}
