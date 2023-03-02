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
        Schema::table('permintaan_detail', function (Blueprint $table) {
            $table->string('draf_selected_vendor')
                ->default('')
                ->after('tanggal_split');
            $table->integer('id_user_draf_selected_vendor')
                ->default(0)
                ->after('draf_selected_vendor');
            $table->date('tanggal_draf_selected_vendor')
                ->nullable()
                ->after('id_user_draf_selected_vendor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permintaan_detail', function (Blueprint $table) {
            //
        });
    }
};
