<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSimulasiTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('simulasi_transaksis', function (Blueprint $table) {
            $table->id();
            $table->date('tgl');
            $table->string('barang');
            $table->integer('harga');
            $table->double('diskon');
            $table->integer('total');
            $table->string('jenis');
            $table->integer('qty');
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
        Schema::dropIfExists('simulasi_transaksis');
    }
}
