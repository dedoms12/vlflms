<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (\App\Models\User::count() == 0) {
            // Use the create method directly on the factory instance
            \App\Models\User::factory()->create(\App\Models\User::factory()->definition());
            \App\Models\User::factory()->create(\App\Models\User::factory()->definitiontwo());
            \App\Models\User::factory()->create(\App\Models\User::factory()->definitionthree());
            \App\Models\User::factory()->create(\App\Models\User::factory()->definitionfour());
        }
    }
}
