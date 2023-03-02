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
        Schema::create('generate_spb', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_permintaan');
            $table->integer('tanggal')->nullable();
            $table->integer('id_branch')->nullable();
            $table->string('branch')->nullable();
            $table->integer('id_department')->nullable();
            $table->string('department')->nullable();
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
        //
    }
};
