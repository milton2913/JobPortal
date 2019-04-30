<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompensationEmploymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compensation_employment', function (Blueprint $table) {
            $table->integer('compensation_id')->unsigned();
            $table->integer('employment_id')->unsigned();
            $table->primary(['employment_id','compensation_id']);
            $table->foreign('compensation_id')->references('id')->on('compensations')->onDelete('cascade');
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
        Schema::dropIfExists('compensation_employment');
    }
}
