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
        Schema::create('checked_messagev', function (Blueprint $table) {
            $table->increments('id_checked_messagev');
            // dati table pemilihan vendor
            $table->integer('id_pemilihan_vendor')->default(0);
            $table->string('nama_checked_messagev')->nullable();
            $table->string('kode_permintaan')->nullable();
            $table->string('kode_permintaan_split')->nullable();
            $table->string('split')->nullable();
            $table->integer('id_vendor_checked')->default(0);
            $table->integer('id_attachment')->default(0);
            $table->string('message_vendor_checked')->nullable();
            $table->integer('id_user')->default(0);
            $table->integer('level')->default(0);
            $table->integer('id_proceed_hold')->default(0);
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
