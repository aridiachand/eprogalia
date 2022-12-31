<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // level = 0:user 1:admin
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('id_branch')->default(0);
            $table->integer('id_departmen')->default(0);
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('foto')->default('default.jpg');
            $table->tinyInteger('level')->default(0);
            $table->string('management')->default(0);
            $table->integer('role_id')->default(0);
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
};
