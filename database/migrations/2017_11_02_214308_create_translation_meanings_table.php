<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTranslationMeaningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('translation_meanings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('text');
            $table->boolean('is_figurative');
            $table->boolean('is_conversational');
            $table->text('explanation');
            $table->string('image_src');
            $table->integer('frequency_usage');
            $table->integer('applying_style_id');
            $table->integer('translation_group_id');

            $table->foreign('translation_group_id')
                ->on('translation_groups')
                ->references('id')
                ->onDelete('SET NULL')
                ->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('translation_meanings');
    }
}
