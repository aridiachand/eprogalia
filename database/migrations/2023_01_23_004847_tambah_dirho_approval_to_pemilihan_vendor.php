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
            $table->integer('selected_dir_ho')
                ->integer(0)
                ->after('message_selected_gm_fat');
            $table->integer('user_selected_dir_ho')
                ->default(0)
                ->after('selected_dir_ho');
            $table->date('tanggal_selected_dir_ho')
                ->nullable()
                ->after('user_selected_dir_ho');
            $table->string('message_selected_dir_ho')
                ->nullable()
                ->after('tanggal_selected_dir_ho');
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
