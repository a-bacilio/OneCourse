<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnlineVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('online_videos', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('url')->nullable();
            $table->string('iframe')->nullable();

            $table->unsignedBigInteger('resource_id')->nullable();
            $table->foreign("resource_id")->references("id")->on("resources")->onDelete("cascade");


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
        Schema::dropIfExists('online_videos');
    }
}
