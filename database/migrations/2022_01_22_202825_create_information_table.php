<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information', function (Blueprint $table) {
            $table->id();

            $table->string('color_logo')->nullable();
            $table->string('black_logo')->nullable();
            $table->string('white_logo')->nullable();
            $table->string('welcome_title')->nullable();
            $table->longText('welcome_text_1')->nullable();
            $table->longText('welcome_text_2')->nullable();
            $table->string('welcome_video')->nullable();
            $table->string('consent_img_1')->nullable();
            $table->string('consent_img_2')->nullable();
            $table->string('consent_img_3')->nullable();
            $table->string('end_title')->nullable();
            $table->longText('end_text_1')->nullable();
            $table->longText('end_text_2')->nullable();
            $table->string('certificate_img')->nullable();
            $table->string('certificate_fontsize')->nullable();
            $table->string('certificate_pos_x')->nullable();
            $table->string('certificate_pos_y')->nullable();

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
        Schema::dropIfExists('information');
    }
}
