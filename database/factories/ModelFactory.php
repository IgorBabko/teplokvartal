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

$factory->define(DymaVDomeNet\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(DymaVDomeNet\Chimney::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->paragraph,
        'type' => 'одностенный',
        'image' => str_random(10),
    ];
});

$factory->define(DymaVDomeNet\Briquette::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->paragraph,
        //'type' => 'одностенный',
        'image' => str_random(10),
    ];
});

$factory->define(DymaVDomeNet\Boiler::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->paragraph,
        //'type' => 'одностенный',
        'image' => str_random(10),
    ];
});

$factory->define(DymaVDomeNet\Article::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->name,
        'short_text' => implode('<br><br>', $faker->paragraphs(rand(1, 2))),
        'text' => implode('<br><br>', $faker->paragraphs(rand(5, 7))),
        'image' => $faker->imageUrl($width = 600, $height = 300),
    ];
});

$factory->define(DymaVDomeNet\Photo::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->word(2),
        'description' => $faker->paragraph,
        'image' => $faker->imageUrl($width = 600, $height = 300),
    ];
});

$factory->define(DymaVDomeNet\Order::class, function (Faker\Generator $faker) {
    return [
        'client_name' => $faker->name,
        'phone1' => $faker->phoneNumber,
        'phone2' => $faker->phoneNumber,
        'email' => $faker->email,
        'question' => $faker->paragraph,
    ];
});
