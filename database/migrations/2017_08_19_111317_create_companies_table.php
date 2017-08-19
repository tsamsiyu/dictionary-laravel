<?php

use App\Core\Tables;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Tables::COMPANIES, function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('jurisdiction_id')->unsigned();
            $table->string('activity');
            $table->string('registration_number');
            $table->date('registration_date');
            $table->date('account_due_date');
            $table->date('incorporation_date');
            $table->integer('year_end');
            $table->text('information_notes');
            $table->text('treasury_notes');
            $table->text('auditors');
            $table->text('agents');
            $table->integer('author_id');
            $table->timestamps();

            $table->foreign('jurisdiction_id')->on(Tables::JURISDICTIONS)->references('id');
            $table->foreign('author_id')->on(Tables::USERS)->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Tables::COMPANIES);
    }
}
