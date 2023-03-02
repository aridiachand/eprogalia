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
        Schema::create('range_pengajuan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('farmasi_nonfarmasi');
            $table->string('cito_noncito');
            $table->string('rutin_nonrutin');
            $table->integer('nilai_satuan_min');
            $table->integer('nilai_satuan_max');
            $table->integer('nilai_total_min');
            $table->integer('nilai_total_max');
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
        Schema::dropIfExists('range_pengajuan');
    }
};
