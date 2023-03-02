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
        Schema::table('permintaan', function (Blueprint $table) {
            $table->integer('approve_technical_expert')
                ->default(0)
                ->after('tanggal_approve_direktur_rs');
            $table->timestamp('tanggal_approve_technical_expert')
                ->nullable()
                ->after('approve_technical_expert');
            $table->integer('approve_gm_ho')
                ->default(0)
                ->after('tanggal_approve_technical_expert');
            $table->timestamp('tanggal_approve_gm_ho')
                ->nullable()
                ->after('approve_gm_ho');
            $table->integer('approve_gm_fat')
                ->default(0)
                ->after('tanggal_approve_gm_ho');
            $table->timestamp('tanggal_approve_gm_fat')
                ->nullable()
                ->after('approve_gm_fat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
};
