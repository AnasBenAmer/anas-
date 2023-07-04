<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=> fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            //'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
           /// 'remember_token' => Str::random(10),
               'sex' =>'male',
               'id_number'=> fake()->numberBetween(1111,466754),
                'national_number' =>fake()->numberBetween(11191,999466754),
                'phone_number' =>fake()->numberBetween(1111,8877),
                 'room_number' => ' 115',
                'room_id' => '1',
                'building_id' => '1',
                'city' =>'alzawia',

        ];
    }
}
