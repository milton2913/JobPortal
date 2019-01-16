<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('countries')->onDelete('cascade');
            $table->boolean('in_bangladesh')->default(true);
            $table->enum('address_type',['Present','Permanent']);
            $table->integer('country_id')->unsigned();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->integer('division_id')->unsigned()->nullable();
            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('set null');

            $table->integer('district_id')->unsigned()->nullable();
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('set null');

            $table->integer('upazila_id')->unsigned()->nullable();
            $table->foreign('upazila_id')->references('id')->on('upazilas')->onDelete('set null');
$table->string('post_code',10)->nullable();
$table->string('others',10)->nullable();

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
        Schema::dropIfExists('addresses');
    }
}
