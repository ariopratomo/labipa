<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemusnahanBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemusnahan_barang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brg_id');
            $table->string('keterangan');
            $table->integer('jml_musnah');
            $table->date('tgl_musnah');
            $table->foreign('brg_id')->references('id')->on('barang')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemusnahan_barang');
    }
}
