<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Barang;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Barang::class, function (Faker $faker) {
    $startingDate = $faker->dateTimeThisYear('+1 month');
    $endingDate   = strtotime('+1 Week', $startingDate->getTimestamp());
    return [
        'nm_brg' => ['Beker gelas 100 ml', 'Buret', 'Gelas ukur 5mL', 'Lumpang dan alu', 'Multi meter', 'Pipet tetes', 'Pipet ukur'],
        'fungsi_brg' => ['Tempat untuk percobaan', 'Menempatkan larutan tertentu yang akan digunakan untuk titrasi', 'Untuk mengukur volume larutan', 'Untuk menumbuk/ menghaluskan bahan kimia', 'Untuk mengukur kuat arus listrik atau hambatan', 'Untuk meneteskan larutan dengan jumlah kecil', 'untuk mengambil larutan dengan volume tertentu '],
        'jml_brg' => rand(20, 30),
        'created_at' => $startingDate,
        'updated_at'   => $endingDate,
    ];
});
