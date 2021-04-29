<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

// namespace Database\Factories;

use App\Models\User;
use App\Models\Communicationmessage;
use Faker\Generator as Faker;
//use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

    $factory->define(User::class, function (Faker $faker) {
        return [
            'name' => $faker->name,
            'image' => 'https://man1live.s3.amazonaws.com/man1live.png',
            'email' => $faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    });


        $factory->define(Communicationmessage::class, function (Faker $faker) {
            do {
                $sender = rand(1, 30);
                $receiver = rand(1, 30);
                $is_viewed = rand(0, 1);
            } while ($sender === $receiver);

            return [
                'sender' => $sender,
                'receiver' => $receiver,
                'communicationmessage' => $faker->sentence,
                'is_viewed' => $is_viewed
            ];
        });

