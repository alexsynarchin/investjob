<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('login')->unique();
            $table->string('name');
            $table->string('profile_type') -> nullable();
            $table->string('surname')->nullable();
            $table->string('patronymic') -> nullable();
            $table->string('email')->unique() -> nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('deprecated_password')->nullable();
            $table->boolean('active')->default(true);
            $table->bigInteger('import_id')->unsigned()->nullable();
            $table->dateTime('last_login')->nullable();
            $table ->dateTime('register_date')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
