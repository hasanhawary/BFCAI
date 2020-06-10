<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('subject')->nullable();
            $table->text('content')->nullable();
            $table->boolean('important')->default(0);
            $table->enum('receive_user', ['none', 'instructors', 'students'])->default('none');
            $table->integer('receive_user_id')->nullable();
            $table->enum('send_user', ['instructors', 'students'])->default('students');
            $table->integer('send_user_id');
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
        Schema::dropIfExists('messages');
    }
}
