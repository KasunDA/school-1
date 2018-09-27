<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->string('name')->unique();
            $table->text('detail')->nullable();
            $table->string('them');
            $table->string('domain')->nullable();
            $table->string('icon')->default('sub_icon.ico');
            $table->string('logo')->default('sub_logo.png');
            $table->string('banner')->default('sub_banner.jpg');
            $table->timestamps('expaire_date');
            $table->boolean('visible');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schools');
    }
}
