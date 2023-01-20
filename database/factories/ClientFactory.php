<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
            'im_kodas' => $this->faker->numberBetween(10000,99999),
            'klientas' => $this->faker->firstName(),
            'adresas' => $this->faker->address(),
            'miestas' => $this->faker->city(),
            'pasto_kodas'=> $this->faker->numberBetween(1000,9999),
            'telefonas'=> $this->faker->unique()->phoneNumber(),
            'el_pastas'=> $this->faker->unique()->safeEmail()
    ];
});
