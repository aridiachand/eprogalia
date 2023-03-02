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
        Schema::create('vendor_terpilih', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_permintaan');
            $table->string('kode_permintaan_split');
            $table->integer('id_vendor');
            $table->string('nama_vendor');
            $table->integer('nilai_vendor')->default(0);
            $table->integer('dp_vendor')->default(0);
            $table->integer('id_vendor_update')->default(0);
            $table->string('nama_vendor_update')->nullable();
            $table->integer('nilai_vendor_update')->default(0);
            $table->integer('dp_vendor_update')->default(0);
            $table->integer('id_user_update');
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
