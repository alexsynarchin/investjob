<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('option_values', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('option_id')->unsigned();
            $table->foreign('option_id')
                ->references('id')
                ->on('options')
                ->onDelete('CASCADE');
            $table->string('value');
            $table->integer('bitrix_id')->unsigned()->nullable();
            $table->bigInteger('menuindex')->unsigned()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('option_values');
    }
}
