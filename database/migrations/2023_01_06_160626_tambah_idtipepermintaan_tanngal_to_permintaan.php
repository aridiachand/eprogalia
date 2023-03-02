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
            $table->integer('id_tipe_permintaan')
                ->nullable()
                ->after('department_id');
            $table->string('nama_tipe_permintaan')
                ->nullable()
                ->after('id_tipe_permintaan');
            $table->integer('id_prioritas_permintaan')
                ->nullable()
                ->after('nama_tipe_permintaan');
            $table->string('nam_prioritas_permintaan')
                ->nullable()
                ->after('id_prioritas_permintaan');

            $table->timestamp('tanggal_approve_manager_peminta')
                ->nullable()
                ->after('approve_manager_peminta');
            $table->timestamp('tanggal_approve_manager_keuangan_unit')
                ->nullable()
                ->after('approve_manager_keuangan_unit');
            $table->timestamp('tanggal_approve_direktur_rs')
                ->nullable()
                ->after('approve_direktur_rs');
            $table->timestamp('tanggal_approve_procurement')
                ->nullable()
                ->after('approve_procurement');
            $table->timestamp('tanggal_approve_manager_procurement')
                ->nullable()
                ->after('approve_manager_procurement');
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
