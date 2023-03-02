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
            $table->string('split')
                ->default('')
                ->after('deskripsi');
            $table->integer('id_user_split')
                ->default(0)
                ->after('split');
            $table->date('tanggal_split')
                ->nullable()
                ->after('id_user_split');
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
