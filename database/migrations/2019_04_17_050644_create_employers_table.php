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
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('company_name',200);
            $table->string('company_name_bn',200);
//company address
            $table->integer('country_id')->unsigned();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');

            $table->integer('division_id')->unsigned()->nullable();
            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('set null');
            $table->integer('district_id')->unsigned()->nullable();
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('set null');

            $table->integer('upazila_id')->unsigned()->nullable();
            $table->foreign('upazila_id')->references('id')->on('upazilas')->onDelete('set null');
            $table->text('address')->nullable();
            $table->text('address_bn')->nullable();
            $table->string('contact_phone',20);
            $table->string('email',100);
//end of company address

            //industry types
            $table->integer('industry_type_id')->unsigned();
            $table->foreign('industry_type_id')->references('id')->on('industry_types')->onDelete('cascade');
            //go to pivot table insert employee_industry table relation between industry type and industries
            //end of the industry types

            $table->text('description')->nullable();// it's a business description
            $table->string('trade_license_no',100)->nullable();
            $table->string('rl_no',100)->nullable();
            $table->text('website_url')->nullable();


            $table->string('contact_person_name',100);
            $table->string('contact_person_designation',100);
            $table->string('contact_person_mobile',20)->nullable();
            $table->string('contact_person_email',20)->nullable();

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
