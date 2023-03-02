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
        // jika id permintaan detail 0 maka file spb
        Schema::create('file_upload', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_file')->nullable();
            $table->string('kode_permintaan')->nullable();
            $table->integer('id_permintaan')->default(0);
            $table->integer('id_user_upload')->nullable();
            $table->integer('id_permintaan_detail')->default(0);
            $table->string('name')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('file_path')->nullable();
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
