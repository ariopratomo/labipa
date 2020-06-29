<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemakaianBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemakaian_barang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('brg_id');
            $table->integer('jml_pakai');
            $table->integer('jml_kembali')->nullable();
            $table->string('ket_pakai');
            $table->enum('status', ['dipakai', 'dikembalikan']);
            $table->date('tgl_pakai');
            $table->date('tgl_kembali')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
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
        Schema::dropIfExists('pemakaian_barang');
    }
}
