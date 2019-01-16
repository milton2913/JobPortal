<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',200);
            $table->string('local_name',200);
            $table->string('contact_person',100);
            $table->string('contact_person_designation',100);
            $table->string('contact_person_mobile',20)->nullable();
            $table->string('contact_person_email',20)->nullable();
            $table->text('contact_person_address');
            $table->integer('country_id')->unsigned();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->integer('district_id')->unsigned()->nullable();
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('set null');
            $table->integer('area_id')->unsigned()->nullable();
            $table->foreign('area_id')->references('id')->on('areas')->onDelete('set null');
            $table->text('billing_address');
            $table->string('contact_phone',20);
            $table->string('email',50);
            $table->string('website',200);
            $table->boolean('is_active',true);
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
        Schema::dropIfExists('employers');
    }
}
