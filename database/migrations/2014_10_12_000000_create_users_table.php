<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();

            $table->text('gender')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('education_level')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('occupation')->nullable();
            $table->string('residence_state')->nullable();
            $table->string('residence_province')->nullable();
            $table->string('residence_district')->nullable();
            $table->string('covid_family')->nullable();
            $table->string('caretaker_you')->nullable();
            $table->string('caretaker_pro')->nullable();

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
        Schema::dropIfExists('users');
    }
}
