<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Poll::class, function (Faker $faker) {
    return [
        'title' => $faker->realText(50),
    ];
});

$factory->define(App\Question::class, function (Faker $faker) {
    $poll_ids = DB::table('polls')->pluck('id')->all();

    return [
        'title' => $faker->realText(50),
        'question' => $faker->realText(500),
        'poll_id' => $faker->randomElement($poll_ids),
    ];
});

$factory->define(App\Answer::class, function (Faker $faker) {
    $question_ids = DB::table('questions')->pluck('id')->all();

    return [
        'answer' => $faker->realText(500),
        'question_id' => $faker->randomElement($question_ids),
    ];
});
