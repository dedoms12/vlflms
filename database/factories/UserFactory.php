<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User; // Make sure to import the User model if not already imported

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Admin',
            'username' => 'admin',
            'password' => bcrypt('1234'),
        ];
    }

    public function definitiontwo()
    {
        return [
            'name' => 'Aljon Fernando',
            'username' => 'Librarian1',
            'password' => bcrypt('password'), // Use bcrypt() to hash the password
        ];
    }

    public function definitionthree()
    {
        return [
            'name' => 'Carl Lexter Buron',
            'username' => 'Librarian2',
            'password' => bcrypt('password'), // Use bcrypt() to hash the password
        ];
    }

    public function definitionfour()
    {
        return [
            'name' => 'Raneil Dedomo',
            'username' => 'Librarian3',
            'password' => bcrypt('password'), // Use bcrypt() to hash the password
        ];
    }
}