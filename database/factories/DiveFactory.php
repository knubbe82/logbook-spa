<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model\Dive;
use Faker\Generator as Faker;

$factory->define(Dive::class, function (Faker $faker) {
    return [
        'time' => $faker->dateTimeBetween('-1 year', 'now'),
        'location' => $faker->address,
        'bottom_time' => $faker->numberBetween(20, 120),
        'max_depth' => $faker->numberBetween(5, 60),
        'water_temp' => $faker->numberBetween(3, 25),
        'day_night' => $faker->boolean(),
        'visibility' => $faker->numberBetween(1, 20),
        'dive_start' => $faker->randomElement(['wreck', 'cave', 'boat', 'shore']),
        'current' => $faker->randomElement(['none', 'some', 'strong']),
        'tank_type' => $faker->randomElement(['steel', 'alu']),
        'tank_capacity' => $faker->randomElement(['10L', '12L', '15L', '18L']),
        'bar_start' => $faker->numberBetween(220, 180),
        'bar_end' => $faker->numberBetween(150, 30),
        'gas_mix' => $faker->randomElement(['Air', 'EAN', 'Tx']),
        'belt_weights' => $faker->numberBetween(5, 15),
        'bcd_weights' => $faker->numberBetween(5, 15),
        'description' => $faker->paragraph(3),
        'user_id' => function() {
            return App\User::all()->random();
        }
    ];
});
