<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model\Dive;
use Faker\Generator as Faker;

$factory->define(Dive::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'location' => $faker->address,
        'time' => $faker->dateTimeBetween('-1 year', 'now'),
        'description' => $faker->paragraph,
        'user_id' => function() {
            return App\User::all()->random();
        }
    ];
});
