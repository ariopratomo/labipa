<?php

use App\Kelas;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kelas::create([
            'kelas' => 'Kelas 7A',
            'created_at' => now(),
            'updated_at'   => now(),
        ]);
        Kelas::create([
            'kelas' => 'Kelas 7B',
            'created_at' => now(),
            'updated_at'   => now(),
        ]);
        Kelas::create([
            'kelas' => 'Kelas 7C',
            'created_at' => now(),
            'updated_at'   => now(),
        ]);
        Kelas::create([
            'kelas' => 'Kelas 7D',
            'created_at' => now(),
            'updated_at'   => now(),
        ]);
        Kelas::create([
            'kelas' => 'Kelas 8A',
            'created_at' => now(),
            'updated_at'   => now(),
        ]);
        Kelas::create([
            'kelas' => 'Kelas 8B',
            'created_at' => now(),
            'updated_at'   => now(),
        ]);
        Kelas::create([
            'kelas' => 'Kelas 8C',
            'created_at' => now(),
            'updated_at'   => now(),
        ]);
        Kelas::create([
            'kelas' => 'Kelas 8D',
            'created_at' => now(),
            'updated_at'   => now(),
        ]);
        Kelas::create([
            'kelas' => 'Kelas 9A',
            'created_at' => now(),
            'updated_at'   => now(),
        ]);
        Kelas::create([
            'kelas' => 'Kelas 9B',
            'created_at' => now(),
            'updated_at'   => now(),
        ]);
        Kelas::create([
            'kelas' => 'Kelas 9C',
            'created_at' => now(),
            'updated_at'   => now(),
        ]);
        Kelas::create([
            'kelas' => 'Kelas 9D',
            'created_at' => now(),
            'updated_at'   => now(),
        ]);
    }
}
