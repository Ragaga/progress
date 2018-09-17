<?php

use Faker\Generator as Faker;

$factory->define(\App\Entities\Grade::class, function (Faker $faker) {
    $subject = \App\Entities\Subject::orderBy(new \Illuminate\Database\Query\Expression('random()'))
        ->take(1)
        ->first();
    $student = \App\Entities\Student::orderBy(new \Illuminate\Database\Query\Expression('random()'))
        ->take(1)
        ->first();
    return [
        'subject_id' => $subject->id,
        'student_id' => $student->id,
        'grade' => rand(1,5),
        'date' =>  $faker->dateTimeBetween($student->registration_time)
    ];
});
