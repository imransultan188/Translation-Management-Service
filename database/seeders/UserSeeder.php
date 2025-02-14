<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a single admin user
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@mail.com',
            'password' => bcrypt('password'), // You can use Hash::make('password') as well
        ]);

        // Create multiple random users
        User::factory(10)->create(); // Creates 10 random users
    }
}
