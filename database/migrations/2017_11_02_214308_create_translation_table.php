<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('translations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('text');
            $table->boolean('is_figurative')->nullable();
            $table->boolean('is_conversational')->nullable();
            $table->text('explanation')->nullable();
            $table->string('image_src')->nullable();
            $table->integer('frequency_usage')->nullable();
            $table->integer('applying_style_id')->nullable();
            $table->integer('group_id');
            $table->integer('translated_word_id');
            $table->timestamps();

            $table->foreign('group_id')
                ->on('translation_groups')
                ->references('id')
                ->onDelete('SET NULL')
                ->onUpdate('CASCADE');

            $table->foreign('translated_word_id')
                ->on('words')
                ->references('id')
                ->onDelete('CASCADE')
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
        Schema::dropIfExists('translations');
    }
}
