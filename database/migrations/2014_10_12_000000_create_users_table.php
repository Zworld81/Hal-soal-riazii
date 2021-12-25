<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone_number')->unique();
            $table->string('natural_code')->nullable();
            $table->string('email')->nullable();
            $table->string('city')->nullable();
            $table->string('birthday')->nullable();
            $table->string('password');
            $table->integer('stars')->default(config('custom.default_stars'));
            $table->integer('level')->default(1); //0 =>super admin| 1 =>user| 2 =>teacher
            $table->boolean('have_active_question')->default(false);
            $table->string('referral_code')->nullable();//current referral code for this user
            $table->string('referral_code_used')->nullable();//used referral code
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
