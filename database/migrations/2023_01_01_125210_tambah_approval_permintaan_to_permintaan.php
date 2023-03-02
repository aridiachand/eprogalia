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
            $table->integer('approve_manager_peminta')
                ->default(0)
                ->after('id_user_input');
            $table->integer('approve_manager_keuangan_unit')
                ->default(0)
                ->after('approve_manager_peminta');
            $table->integer('approve_direktur_rs')
                ->default(0)
                ->after('approve_manager_keuangan_unit');
            $table->integer('approve_procurement')
                ->default(0)
                ->after('approve_direktur_rs');
            $table->integer('approve_manager_procurement')
                ->default(0)
                ->after('approve_procurement');
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
            $table->dropColumn('approve_manager_peminta');
        });
    }
};
