<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEduPlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edu_places', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('resume_id')->unsigned()->index()->nullable();
            $table->foreign('resume_id')
                ->references('id')
                ->on('resumes')
                ->onDelete('CASCADE');
            $table->string('name');
            $table->bigInteger('import_id')->unsigned()->nullable();
            $table->string('speciality') -> nullable();
            $table->string('diploma')->nullable();
            $table->date('start')->nullable();
            $table->date('end')->nullable();
            $table->bigInteger('menuindex')->unsigned()->default(0);
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
        Schema::dropIfExists('edu_places');
    }
}
