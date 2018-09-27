<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->unsignedBigInteger('user_id');
            $table->tinyInteger('gender');
            $table->string('fathers_name')->nullable();
            $table->string('meli', 10);
            $table->string('place', 100)->nullable();
            $table->date('birthdate')->nullable();
            $table->string('address')->nullable();
            $table->string('zipcode', 10)->nullable();
            $table->string('tel', 11)->nullable();
            $table->string('mobile', 11);
            $table->string('mail', 100)->nullable();
            $table->string('avatar', 100)->nullable();
            $table->string('comment', 100)->nullable();
            $table->string('degree', 100)->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
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
