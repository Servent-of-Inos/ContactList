<?php

use Faker\Generator as Faker;

$factory->define(App\Contact::class, function (Faker $faker) 
{

    $contact = [

    	'id'=> $faker->unique()->numberBetween($min = 1, $max = 50),
        'name' => $faker->firstName,
        'surname' => $faker->lastName,
        'email' => $faker->email,
        'phone_number' =>$faker->e164PhoneNumber,
        'birthday' =>$faker->date($format = 'Y-m-d', $max = 'now'),
        
    ];

    return $contact;

});
