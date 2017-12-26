<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOriginalDictaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('original_dicta', function (Blueprint $table) {
            $table->increments('id');
            $table->string('spelling');
            $table->integer('author_id');
            $table->integer('language_id');
            $table->string('spelling_root')->nullable();
            $table->integer('lexical_type_id')->nullable();
            $table->integer('speech_part_id')->nullable();
            $table->timestamps();

            $table->foreign('author_id')
                ->on('users')
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
        Schema::dropIfExists('original_dicta');
    }
}
