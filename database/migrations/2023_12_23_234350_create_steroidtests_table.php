<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSteroidtestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('steroidtests', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('steroid_id');
            $table->bigInteger('test_id');
            $table->tinyInteger('percent')->default(0);
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
        Schema::dropIfExists('feelings');
    }
}
