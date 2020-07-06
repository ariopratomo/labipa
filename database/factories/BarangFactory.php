<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Barang;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Barang::class, function (Faker $faker) {
    return [
        'nm_brg' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        // 'kegunaan_barang' => $faker->sentence($nbWords = 4, $variableNbWords = true),
        'jml_brg' => rand(20, 30)
    ];
});
