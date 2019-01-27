<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDegreeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('degrees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',150)->unique();
            $table->integer('education_level_id')->unsigned();
            $table->string('short_name',100)->nullable();
            $table->text('description')->nullable();
            $table->enum('is_active',[0,1])->default(1);//0 is inactive, 1 is active with suggestion
            $table->foreign('education_level_id')->references('id')->on('education_levels')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('degrees');
    }
}
