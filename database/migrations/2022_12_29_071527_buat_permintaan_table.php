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
        Schema::create('permintaan', function (Blueprint $table) {
            $table->increments('id_permintaan');
            $table->string('kode_permintaan');
            $table->integer('branch_id')->default(0);
            $table->integer('department_id')->default(0);
            $table->integer('total_item')->default(0);
            $table->integer('id_user_input')->default(0);
            $table->integer('id_status_approve_reject')->default(0);
            $table->integer('id_user_approve_reject')->default(0);
            $table->timestamp('tanggal_approve_reject')->nullable();
            $table->integer('id_status_edit')->default(0);
            $table->integer('id_user_edit')->default(0);
            $table->timestamp('tanggal_edit')->nullable();
            $table->timestamp('tanggal_permintaan');
            $table->timestamp('tanggal_dibutuhkan');
            $table->string('deskripsi')->default('none');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permintaan');
    }
};
