<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_to_users', function (Blueprint $table) {
            $table->id();
            $table->integer('admin_id');//who requested
            $table->integer('user_id');//payed to this user
            $table->string('old_stars');
//            $table->string('current_stars');
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
        Schema::dropIfExists('pay_to_users');
    }
}
