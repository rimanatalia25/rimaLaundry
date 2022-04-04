<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensTable extends Migration
{

    public function up()
    {
        Schema::create('absen', function (Blueprint $table) {
            $table->id();
            $table->string ('nama');
            $table->date ('tgl_masuk');
            $table->time('waktu_masuk');
            $table->enum('status', ['sakit', 'masuk', 'cuti']);
            $table->time('waktu_selesai');
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
        Schema::dropIfExists('absens');
    }
}
