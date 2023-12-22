<?php

use App\Enums\AnswerTypeEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('type')->default(AnswerTypeEnum::PACKAGE);
            $table->tinyInteger('order')->default(1);
            $table->bigInteger('test_id');
            $table->bigInteger('package_id')->nullable();
            $table->bigInteger('medicine_id')->nullable();
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
        Schema::dropIfExists('answers');
    }
}
