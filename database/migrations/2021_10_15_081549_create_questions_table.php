<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('teacher_id')->nullable();
            $table->integer('class');
            $table->string('file');
            $table->string('response_file')->nullable();
            $table->longText('description');
            $table->boolean('need_support')->nullable();
            $table->integer('status')->default(0); //0 in progress | 1 completed | 2 ignored
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
        Schema::dropIfExists('questions');
    }
}
