<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /**
         * Creates the admin user.
         */
        User::factory()->create([
            'name' => 'Florian Koning',
            'email' => 'florian.koning2004@gmail.com',
            'role_id' => 1,
            'password' => Hash::make('Floko2635!!!'),
            'encryption_salt' => random_bytes(16),
        ]);

        /**
         * Creates admin role.
         */
        Role::factory()->create([
            'role_name' => 'admin'
        ]);

        /**
         * Creates a user role.
         */
        Role::factory()->create([
            'role_name' => 'user'
        ]);
    }
}
