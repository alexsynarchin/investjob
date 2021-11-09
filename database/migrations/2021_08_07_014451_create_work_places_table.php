<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkPlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_places', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->bigInteger('resume_id')->unsigned()->index()->nullable();
            $table->foreign('resume_id')
                ->references('id')
                ->on('resumes')
                ->onDelete('CASCADE');
            $table->text('description')->nullable();
            $table->string('city')->nullable();
            $table->string('speciality') -> nullable();
            $table->date('start')->nullable();
            $table->date('end')->nullable();
            $table->bigInteger('import_id')->unsigned()->nullable();
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
        Schema::dropIfExists('work_places');
    }
}
