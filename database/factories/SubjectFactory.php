<?php

use Faker\Generator as Faker;

$factory->define(\App\Entities\Subject::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
    ];
});
