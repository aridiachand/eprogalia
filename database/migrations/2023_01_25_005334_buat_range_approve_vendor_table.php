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
        Schema::create('range_approve_vendor', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('min');
            $table->integer('max');
            $table->string('selected_field');
            $table->integer('level')->default(0);
            $table->string('nama_level')->nullable();
            $table->integer('excep_level')->default(0);
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
        //
    }
};
