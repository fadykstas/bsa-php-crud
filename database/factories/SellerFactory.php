<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Seller;
use Faker\Generator as Faker;

$factory->define(Seller::class, function (Faker $faker) {
    return [
        'name' => $faker->name
    ];
});
