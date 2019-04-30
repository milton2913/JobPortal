<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmploymentJobLevelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employment_job_level', function (Blueprint $table) {
            $table->integer('job_level_id')->unsigned();
            $table->integer('employment_id')->unsigned();
            $table->primary(['employment_id','job_level_id']);
            $table->foreign('job_level_id')->references('id')->on('job_levels')->onDelete('cascade');
            $table->foreign('employment_id')->references('id')->on('employments')->onDelete('cascade');
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
        Schema::dropIfExists('employment_job_level');
    }
}
