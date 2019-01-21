<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            //name, email, mobile, avatar save for users table
            $table->enum('gender',['Male','Female','Others']);
            $table->enum('marital_status',['Single','Married','Others']);
            $table->enum('religion',['Islam','Christianity','Judaism','Hinduism','Buddhism','Other']);
            $table->enum('blood',['A+','A-','B+','B-','O+','O-','AB+','AB-']);
            $table->integer('country_id')->unsigned()->nullable();//using for nationality purpose
            $table->date('date_of_birth');
            $table->string('father_name',100);
            $table->string('mother_name',100);
            $table->enum('identity_type',['National ID','Brith Certificate','Passport'])->nullable();
            $table->string('identity_no',20)->nullable();
            $table->string('alternate_email',100)->nullable();
            $table->string('alternate_mobile',15)->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('set null');
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
        Schema::dropIfExists('profiles');
    }
}
