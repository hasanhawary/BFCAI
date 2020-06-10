<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatrielsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matriels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('type', ['lecture', 'section'])->default('lecture');
            $table->unsignedBigInteger('week_id');
            $table->foreign('week_id')->references('id')->on('cource_weeks')->onDelete('cascade');
            $table->unsignedBigInteger('cource_id');
            $table->foreign('cource_id')->references('id')->on('cources')->onDelete('cascade');
            $table->unsignedBigInteger('instructor_id');
            $table->foreign('instructor_id')->references('id')->on('instructors')->onDelete('cascade');
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
        Schema::dropIfExists('matriels');
    }
}
