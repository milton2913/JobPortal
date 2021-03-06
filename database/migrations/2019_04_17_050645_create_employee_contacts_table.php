<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employer_contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employer_id')->unsigned();
            $table->foreign('employer_id')->references('id')->on('employers')->onDelete('cascade');
            $table->string('name',150);
            $table->string('email',100)->unique();
            $table->string('mobile',20)->unique()->nullable();
            $table->string('designation',100);
            $table->string('username',30)->unique();
            $table->string('password')->nullable();
            $table->enum('is_active',[0,1])->default(1);//0 is inactive, 1 is active with suggestion
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
        Schema::dropIfExists('employer_contacts');
    }
}
