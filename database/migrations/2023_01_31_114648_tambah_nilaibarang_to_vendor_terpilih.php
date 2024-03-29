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
            $table->integer('nilai_barang')->default(0);
            $table->integer('nilai_barang_update')->default(0);
            $table->integer('qty_barang')->default(0);
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
