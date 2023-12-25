<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsertestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usertests', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->json('packages')->default('[]');
            $table->json('steroids')->default('[]');
            $table->json('chart')->default('[]');
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
        Schema::dropIfExists('usertests');
    }
}
