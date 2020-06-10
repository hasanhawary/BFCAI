<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnouncmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('receive_user', ['instructors', 'students'])->default('students');
            $table->text('content');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('instructors')->onDelete('cascade');
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
        Schema::dropIfExists('announcments');
    }
}
