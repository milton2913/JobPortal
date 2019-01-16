<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperienceSkillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experience_skill', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('experience_id')->unsigned();
            $table->foreign('experience_id')->references('id')->on('experiences')->onDelete('cascade');
            $table->integer('skill_id')->unsigned();
            $table->foreign('skill_id')->references('id')->on('skills')->onDelete('cascade');

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
        Schema::dropIfExists('experience_skill');
    }
}
