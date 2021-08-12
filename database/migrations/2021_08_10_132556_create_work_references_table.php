<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_references', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('import_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('slug');
            $table->bigInteger('menuindex')->unsigned()->default(0);
            $table->bigInteger('parent_id')->unsigned()->nullable();
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
        Schema::dropIfExists('work_references');
    }
}
