<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('references', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->string('designation',100)->nullable();
            $table->string('organization',200)->nullable();
            $table->string('mobile',15);
            $table->string('phone_office',15)->nullable();
            $table->string('phone_residential',15)->nullable();
            $table->string('email',100)->nullable();
            $table->text('address')->nullable();
            $table->text('description')->nullable();
            $table->integer('reference_type_id')->unsigned()->nullable();
            $table->foreign('reference_type_id')->references('id')->on('reference_types')->onDelete('set null');
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
        Schema::dropIfExists('references');
    }
}
