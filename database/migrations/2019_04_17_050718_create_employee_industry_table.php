<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeIndustryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employer_industry', function (Blueprint $table) {
            $table->integer('employer_id')->unsigned();
            $table->integer('industry_id')->unsigned();
            $table->primary(['employer_id', 'industry_id']);
            $table->foreign('employer_id')->references('id')->on('employers')->onDelete('cascade');
            $table->foreign('industry_id')->references('id')->on('industries')->onDelete('cascade');
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
        Schema::dropIfExists('employer_industry');
    }
}
