<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cources', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('cource_code')->nullable();
            $table->string('image')->default('cource.jpg');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('share_user_id')->nullable();
            $table->foreign('share_user_id')->references('id')->on('instructors')->onDelete('cascade');
            $table->enum('semester', [1, 2])->default(1);
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
        Schema::dropIfExists('cources');
    }
}
