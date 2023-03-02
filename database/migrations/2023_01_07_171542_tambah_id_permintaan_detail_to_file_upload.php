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
        Schema::table('file_upload', function (Blueprint $table) {
            $table->integer('id_permintaan_detail')
                ->default(0)
                ->after('kode_permintaan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('file_upload', function (Blueprint $table) {
            //
        });
    }
};
