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
        Schema::table('jabatan_approval_vendor', function (Blueprint $table) {
            $table->string('alias')
                ->default('')
                ->after('nama_approval');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('approval_vendor_level', function (Blueprint $table) {
            //
        });
    }
};
