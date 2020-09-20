<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Orcamento;
use Faker\Generator as Faker;

$factory->define(Orcamento::class, function (Faker $faker) {
    return [
        'title' =>  $faker->name(),
        'description' => $faker->text(20),
        'value' => $faker->randomFloat(2,10,100000),
        'status_id' => random_int(1,5),
        'user_id' => random_int(1,3),
    ];
});
