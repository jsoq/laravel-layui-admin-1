<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Menu::class, function (Faker $faker) {
    return [
        'name' => $faker->lexify(),
        'icon' => $faker->lexify(),
        'url' => $faker->url,
        'pid' => 0,
        'permission_id' => 0,
    ];
});
