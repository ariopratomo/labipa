<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHariOnJadwalLabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jadwal_labs', function (Blueprint $table) {
            $table->enum(
                'hari',
                [
                    'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'
                ]
            )->after('jam');
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
