<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('division_id')->unsigned()->nullable();
            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('set null');
            $table->string('name',80);
            $table->string('local_name',100)->nullable();
            $table->string('lat',80);
            $table->string('lon',80);
            $table->string('website',100);
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
        Schema::dropIfExists('districts');
    }
}
