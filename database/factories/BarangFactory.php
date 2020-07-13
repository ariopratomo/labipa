<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Barang;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Barang::class, function (Faker $faker) {
    $startingDate = $faker->dateTimeThisYear('+1 month');
    $endingDate   = strtotime('+1 Week', $startingDate->getTimestamp());
    return [
        'nm_brg' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        'jml_brg' => rand(20, 30),
        'created_at' => $startingDate,
        'updated_at'   => $endingDate,
    ];
});
