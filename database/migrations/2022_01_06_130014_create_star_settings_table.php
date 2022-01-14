<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStarSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('star_settings', function (Blueprint $table) {
            $table->id();
            $table->integer('default_stars')->default(5);
            $table->integer('per_question_star')->default(2);
            $table->integer('per_support_star')->default(2);
            $table->integer('per_answer_star')->default(2);
            $table->integer('star_price')->default(1000);
            $table->integer('give_gift_star_on_register')->default(5);
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
        Schema::dropIfExists('star_settings');
    }
}
