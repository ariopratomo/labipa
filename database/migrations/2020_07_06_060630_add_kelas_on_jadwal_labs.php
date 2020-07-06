<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKelasOnJadwalLabs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jadwal_labs', function (Blueprint $table) {
            $table->foreignId('kelas_id')->after('user_id');
            $table->foreign('kelas_id')->references('id')->on('kelas')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jadwal_labs', function (Blueprint $table) {
            //
        });
    }
}
