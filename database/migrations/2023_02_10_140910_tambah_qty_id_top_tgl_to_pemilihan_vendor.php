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
        Schema::table('pemilihan_vendor', function (Blueprint $table) {
            $table->integer('qty')->default(0)->nullable()->after('nilai_harga');
            $table->integer('id_top')->default(0)->after('qty');
            $table->text('keterangan_top')->nullable()->after('id_top');
            $table->date('tgl_quotation')->nullable()->after('attachment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pemilihan_vendor', function (Blueprint $table) {
            //
        });
    }
};
