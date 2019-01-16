<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('education_level_id')->unsigned();

            $table->integer('degree_id')->unsigned();//result depend on education levels as a table
            $table->integer('subject_id')->unsigned();//Concentration/ Major/Group
            $table->integer('institute_id')->unsigned();//Concentration/ Major/Group
            $table->enum('is_foreign_institute',[0,1])->default(0);
            $table->string('achievement',250);
            $table->integer('result_type_id')->unsigned();//create a table result_types

            $table->enum('is_hide',[0,1])->default(0);
            $table->string('mark',2); //if result type is division or class

            $table->string('cgpa',5); //if result type is grade
            $table->string('scale',2); //if result type is grade

            $table->string('year',4);
            $table->string('duration',15)->nullable();


            $table->foreign('education_level_id')->references('id')->on('education_levels')->onDelete('cascade');
            $table->foreign('degree_id')->references('id')->on('degrees')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->foreign('institute_id')->references('id')->on('institutes')->onDelete('cascade');
            $table->foreign('result_type_id')->references('id')->on('result_types')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
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
        Schema::dropIfExists('educations');
    }
}
