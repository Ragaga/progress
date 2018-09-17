<?php

use Faker\Generator as Faker;

$factory->define(\App\Entities\Group::class, function (Faker $faker) {
    return [
        'name' => (string) $faker->numberBetween(10,50)
    ];
});
