<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotivationTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motivation_translations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('object_id');
            $table->string('language_code');
            $table->text('text');
            $table->string('author');
            $table->index(['object_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('motivation_translations', function (Blueprint $table) {
            $table->dropIndex('object_id');
        });
        Schema::dropIfExists('motivation_translations');
    }
}
