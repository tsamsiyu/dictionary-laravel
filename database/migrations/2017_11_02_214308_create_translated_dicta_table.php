<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTranslatedDictaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('translated_dicta', function (Blueprint $table) {
            $table->increments('id');
            $table->string('spelling');
            $table->integer('original_dictum_id');
            $table->integer('language_id');
            $table->boolean('is_figurative')->nullable();
            $table->boolean('is_conversational')->nullable();
            $table->integer('frequency_usage')->nullable();
            $table->integer('lexical_type_id')->nullable();
            $table->integer('group_id')->nullable();
            $table->timestamps();

            $table->foreign('group_id')
                ->on('translated_dictum_groups')
                ->references('id')
                ->onDelete('SET NULL')
                ->onUpdate('CASCADE');

            $table->foreign('original_dictum_id')
                ->on('original_dicta')
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
        Schema::dropIfExists('translated_dictums');
    }
}
