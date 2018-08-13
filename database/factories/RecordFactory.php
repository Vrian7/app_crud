<?php

use Faker\Generator as Faker;

$factory->define(App\Record::class, function (Faker $faker) {

	$faker->addProvider(new \Faker\Provider\en_US\Company($faker));
	$faker->addProvider(new \Faker\Provider\Lorem($faker));

	$statuses = App\Status::get()->all();

    return [
		'uuid' => $faker->unique()->randomNumber(8,true),
		'name' => $faker->unique()->catchPhrase,
		'description' => $faker->sentence(),
		'code' => $faker->unique()->randomNumber(8, true) * pow(10, 6),
		'status_id' => $statuses[array_rand($statuses)]->id
    ];
});
