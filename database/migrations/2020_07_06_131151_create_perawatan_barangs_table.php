<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerawatanBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perawatan_barang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brg_id');
            $table->string('kondisi');
            $table->integer('qty');
            $table->date('tgl_rawat');
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
        Schema::dropIfExists('perawatan_barang');
    }
}
