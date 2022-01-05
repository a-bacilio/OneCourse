<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();

            $table->integer('age');
            $table->text('gender');
            $table->text('education_level');
            $table->text('civil_status');
            $table->text('ocupppation');
            $table->text('birth_place');
            $table->string('residence_state');
            $table->string('residence_province');
            $table->string('residence_district');
            $table->boolean('covid_family');
            $table->boolean('caretaker_you');
            $table->boolean('caretaker_pro');
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
        Schema::dropIfExists('profiles');
    }
}
