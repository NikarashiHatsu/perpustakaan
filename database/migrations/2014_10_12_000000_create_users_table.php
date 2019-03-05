<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id')->unique();
            $table->string('name');
            $table->string('access_code')->unique();
            $table->string('password');
            $table->string('reveal')->nullable();
            $table->string('kelas')->nullable();
            $table->string('jurusan')->nullable();
            $table->string('rombel')->nullable();
            $table->string('profile_picture')->nullable();
            $table->integer('role')->nullable();
            $table->integer('logged')->default(0);
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
