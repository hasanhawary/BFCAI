<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourceWeeksTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('cource_weeks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('displayName_ar');
            $table->string('displayName_en');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('cource_weeks');
    }
}
