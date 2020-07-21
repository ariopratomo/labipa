<?php

use App\Barang;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 8; $i++) {


            $date = now();
        }
        // factory(App\Barang::class)->create();
        Barang::create([
            'nm_brg' => 'Beker gelas 100 ml',
            'fungsi_brg' => 'Tempat untuk percobaan',
            'jml_brg' => 12,
            'created_at' => now(),
            'updated_at'   => now(),
        ]);
        Barang::create([
            'nm_brg' => 'Buret',
            'fungsi_brg' => 'Menempatkan larutan tertentu yang akan digunakan untuk titrasi',
            'jml_brg' => 10,
            'created_at' => now(),
            'updated_at'   => now(),
        ]);
        Barang::create([
            'nm_brg' => 'Gelas ukur 5mL',
            'fungsi_brg' => 'Untuk mengukur volume larutan',
            'jml_brg' => 15,
            'created_at' => now(),
            'updated_at'   => now(),
        ]);
        Barang::create([
            'nm_brg' => 'Lumpang dan alu',
            'fungsi_brg' => 'Untuk menumbuk/ menghaluskan bahan kimia',
            'jml_brg' => 16,
            'created_at' => now(),
            'updated_at'   => now(),
        ]);
        Barang::create([
            'nm_brg' => 'Multi meter',
            'fungsi_brg' => 'Untuk mengukur kuat arus listrik atau hambatan',
            'jml_brg' => 7,
            'created_at' => now(),
            'updated_at'   => now(),
        ]);
        Barang::create([
            'nm_brg' => 'Pipet tetes',
            'fungsi_brg' => 'Untuk meneteskan larutan dengan jumlah kecil',
            'jml_brg' => 20,
            'created_at' => now(),
            'updated_at'   => now(),
        ]);
        Barang::create([
            'nm_brg' => 'Pipet ukur',
            'fungsi_brg' => 'Untuk mengambil larutan dengan volume tertentu',
            'jml_brg' => 19,
            'created_at' => now(),
            'updated_at'   => now(),
        ]);
    }
}
