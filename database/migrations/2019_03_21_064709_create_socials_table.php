<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->string('icon',100);
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });

        Schema::create('socials', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('social_category_id')->unsigned();
            $table->string('url',500);
            $table->foreign('social_category_id')->references('id')->on('social_categories')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('socials');
        Schema::dropIfExists('social_categories');
    }
}
