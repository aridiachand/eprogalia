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
        Schema::table('vendor_terpilih', function (Blueprint $table) {
            $table->string('kode_barang')->nullable()->after('kode_permintaan_split');
            $table->string('nama_barang')->nullable()->after('kode_barang');

            $table->string('kode_barang_update')->nullable()->after('nama_barang');
            $table->string('nama_barang_update')->nullable()->after('kode_barang_update');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vendor_terpilih', function (Blueprint $table) {
            //
        });
    }
};
