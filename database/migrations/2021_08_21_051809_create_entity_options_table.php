<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntityOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entity_options', function (Blueprint $table) {
            $table->id();
            $table->string('entity_type');
            $table->bigInteger('entity_id')->unsigned();
            $table->bigInteger('option_id')->unsigned();
            $table->bigInteger('menuindex')->unsigned()->default(0);
            $table->foreign('option_id')
                ->references('id')
                ->on('options')
                ->onDelete('CASCADE');
            $table->bigInteger('value_id')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entity_options');
    }
}
