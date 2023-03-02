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
            $table->integer('selected_technical_expert')
                ->default(0)
                ->after('keterangan');
            $table->integer('user_selected_technical_expert')
                ->default(0)
                ->after('selected_technical_expert');
            $table->date('tanggal_selected_technical_expert')
                ->nullable()
                ->after('user_selected_technical_expert');
            $table->string('message_selected_technical_expert')
                ->nullable()
                ->after('tanggal_selected_technical_expert');

            $table->integer('selected_gm_ho')
                ->default(0)
                ->after('message_selected_technical_expert');
            $table->integer('user_selected_gm_ho')
                ->default(0)
                ->after('selected_gm_ho');
            $table->date('tanggal_selected_gm_ho')
                ->nullable()
                ->after('user_selected_gm_ho');
            $table->string('message_selected_gm_ho')
                ->nullable()
                ->after('tanggal_selected_gm_ho');

            $table->integer('selected_gm_fat')
                ->default(0)
                ->after('message_selected_gm_ho');
            $table->integer('user_selected_gm_fat')
                ->default(0)
                ->after('selected_gm_fat');
            $table->date('tanggal_selected_gm_fat')
                ->nullable()
                ->after('user_selected_gm_fat');
            $table->string('message_selected_gm_fat')
                ->nullable()
                ->after('tanggal_selected_gm_fat');

            $table->integer('selected_md')
                ->default(0)
                ->after('message_selected_gm_fat');
            $table->integer('user_selected_md')
                ->default(0)
                ->after('selected_md');
            $table->date('tanggal_selected_md')
                ->nullable()
                ->after('user_selected_md');
            $table->string('message_selected_md')
                ->nullable()
                ->after('tanggal_selected_md');

            $table->integer('selected_presdir')
                ->default(0)
                ->after('message_selected_md');
            $table->integer('user_selected_presdir')
                ->default(0)
                ->after('selected_presdir');
            $table->date('tanggal_selected_presdir')
                ->nullable()
                ->after('user_selected_presdir');
            $table->string('message_selected_presdir')
                ->nullable()
                ->after('tanggal_selected_presdir');

            $table->integer('selected_owner')
                ->default(0)
                ->after('message_selected_presdir');
            $table->integer('user_selected_owner')
                ->default(0)
                ->after('selected_owner');
            $table->date('tanggal_selected_owner')
                ->nullable()
                ->after('user_selected_owner');
            $table->string('message_selected_owner')
                ->nullable()
                ->after('tanggal_selected_owner');
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
