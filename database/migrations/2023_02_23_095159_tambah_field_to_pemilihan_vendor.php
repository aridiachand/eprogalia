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
            $table->integer('totalarr')->default(0)->after('qty');
            $table->integer('diskon_per_pbj_nominal')->default(0)->after('totalarr');
            $table->integer('subtotal')->default(0)->after('diskon_per_pbj_nominal');
            $table->integer('vat')->default(0)->after('subtotal');
            $table->integer('ongkir')->default(0)->after('vat');
            $table->integer('grand_total')->default(0)->after('ongkir');
            $table->string('delivery_time')->nullable()->after('grand_total');
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
