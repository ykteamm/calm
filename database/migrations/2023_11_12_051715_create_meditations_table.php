<?php

use App\Enums\MeditationGroupEnum;
use App\Enums\MeditationTypeEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeditationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meditations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('meditator_id');
            $table->bigInteger('category_id');
            $table->tinyInteger('type')->default(MeditationTypeEnum::COURSE);
            $table->tinyInteger('group')->default(MeditationGroupEnum::SINGLE);
            $table->bigInteger('views')->default(0);
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
        Schema::dropIfExists('meditations');
    }
}
