<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlterUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('avatar',200)->nullable();
            $table->string('provider',50)->nullable();
            $table->string('provider_id',100)->nullable();
            $table->string('mobile',20)->nullable();
            $table->enum('is_status',[0,1,2,3])->default(0)->comment='0 is a deactivate user, 1 is a activate user and profile done 3 is not complete personal info,2 is complete personal info but others info not complete';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('avatar');
        });
    }
}
