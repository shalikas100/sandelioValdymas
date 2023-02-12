<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
            'kodas' => $this->faker->numberBetween(1000,9999),
            'barkodas' => $this->faker->numberBetween(1000000,9999999),
            'pavadinimas' => $this->faker->firstName(),
            'likutis' => $this->faker->numberBetween(0,0),
            'svoris'=> $this->faker->numberBetween(1,5),
            'vnt_dezeje'=> $this->faker->numberBetween(4,6),
            'gamintojas'=> $this->faker->numberBetween(1,5),
            'tipas'=> $this->faker->unique()->lastName(),
            'vieta_sandelyje'=> $this->faker->numberBetween(1,27)
    ];
});
