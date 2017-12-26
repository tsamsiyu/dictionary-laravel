<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTranslatedDictumGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('translated_dictum_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->text('explanation');
            $table->integer('original_dictum_id');
            $table->timestamps();

            $table->foreign('original_dictum_id')
                ->on('original_dictums')
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
        Schema::dropIfExists('translated_dictum_groups');
    }
}
