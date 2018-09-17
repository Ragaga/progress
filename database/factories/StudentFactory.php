<?php

use Faker\Generator as Faker;
use Illuminate\Database\Query\Expression;

$factory->define(\App\Entities\Student::class, function (Faker $faker) {
    /**
     * @var \Illuminate\Database\Eloquent\Collection $groups
     */
    $group = \App\Entities\Group::orderBy(new Expression('random()'))
        ->take(1)
        ->first();

    if (rand(0, 1)) {
        $ip4 = '127.0.0.1';
    }else{
        $ip4 = $faker->ipv4;
    }

    return [
        'name' => $faker->firstName,
        'surname' => $faker->lastName,
        'email' => $faker->email,
        'birthdate' => $faker->dateTimeBetween('1980-01-01', '2000-01-01'),
        'registration_ip' => $ip4,
        'registration_time' => $faker->dateTimeBetween('2017-01-01'),
        'advisor_review' => rand(0, 5) ? $faker->text(200) : null,
        'group_id' => $group->id,
    ];
});
