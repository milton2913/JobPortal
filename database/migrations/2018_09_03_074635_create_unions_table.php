<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('upazila_id')->unsigned()->nullable();
            $table->foreign('upazila_id')->references('id')->on('upazilas')->onDelete('set null');
            $table->string('name',80);
            $table->string('local_name',100)->nullable();
            $table->string('lat',80);
            $table->string('lon',80);
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
        Schema::dropIfExists('unions');
    }
}
