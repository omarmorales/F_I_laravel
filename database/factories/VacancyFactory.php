<?php

use Faker\Generator as Faker;

$factory->define(App\Vacancy::class, function (Faker $faker) {
    return [
        'name' => $faker->text(50),
        'requirements' => $faker->text(200),
        'description' => $faker->text(200),
        'name_es' => $faker->text(50),
        'requirements_es' => $faker->text(200),
        'description_es' => $faker->text(200),
    ];
});
