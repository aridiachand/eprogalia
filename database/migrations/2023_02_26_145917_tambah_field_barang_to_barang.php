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
        Schema::table('barang', function (Blueprint $table) {
            $table->integer('commodity_id')->default(0)->after('rutin');
            $table->integer('material_group_id')->default(0)->after('commodity_id');
            $table->integer('hna')->default(0)->after('material_group_id');
            $table->integer('hnaplusppn')->default(0)->after('hna');
            $table->integer('pre')->default(0)->after('hnaplusppn');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('barang', function (Blueprint $table) {
            //
        });
    }
};
