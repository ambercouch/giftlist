<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\GiftList::class, function (Faker\Generator $faker) {

    $gift_list_names = [
        'Some List',
        'My Wish List',
        'Stuff',
        '21st Birthday',
        'Richard and Louise 2013',
        'Christmas List 2017',
        'I Want',
        'Marks and Spencer\'s',
        'Stuff for Lou',
        'Dad\'s List',
        'Mum\'s Stuff'
    ];

    return [
        'user_id' => $faker->numberBetween(1,10),
        'gift_list_name' => $faker->randomElement($gift_list_names),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Gift::class, function (Faker\Generator $faker) {



    return [
        'gift_list_id' => 4,
        'gift_name' => $faker->word,
        'gift_url' => $faker->url,
        'user_id' => 1,
    ];
});
