<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Status;
use Faker\Generator as Faker;

$factory->define(status::class, function (Faker $faker) {
    return [
        'description' => $faker->word
    ];
});
