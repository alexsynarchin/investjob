<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferenceBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reference_books', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('import_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('type');
            $table->string('slug');
            $table->bigInteger('parent_id')->unsigned()->default(0);
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
        Schema::dropIfExists('reference_books');
    }
}
