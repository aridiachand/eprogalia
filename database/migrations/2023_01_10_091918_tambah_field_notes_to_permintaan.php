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
            $table->string('note_manager_peminta')
                ->nullable()
                ->after('tanggal_approve_manager_peminta');

            $table->string('note_manager_keuangan_unit')
                ->nullable()
                ->after('tanggal_approve_manager_keuangan_unit');

            $table->string('note_direktur_rs')
                ->nullable()
                ->after('tanggal_approve_direktur_rs');

            $table->string('note_technical_expert')
                ->nullable()
                ->after('tanggal_approve_technical_expert');

            $table->string('note_gm_ho')
                ->nullable()
                ->after('tanggal_approve_gm_ho');

            $table->string('note_gm_fat')
                ->nullable()
                ->after('tanggal_approve_gm_fat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permintaan', function (Blueprint $table) {
            //
        });
    }
};
