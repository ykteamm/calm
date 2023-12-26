<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSteroidinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('steroidinfos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('steroid_id');
            $table->tinyInteger('min')->default(0);
            $table->integer('max')->default(10000);
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
        Schema::dropIfExists('steroidinfos');
    }
}
