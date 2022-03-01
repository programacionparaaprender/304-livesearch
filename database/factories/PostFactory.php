<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title'=> $this->faker->name,
        'content'=> $this->faker->text(500),
        'user_id'=> 1
    ];
});
