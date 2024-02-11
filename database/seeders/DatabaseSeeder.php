<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Roles::create([
            'name' => 'admin',
        ]);

        Roles::create([
            'name' => 'marketing',
        ]);

        User::create([
            'name' => 'admin',
            'slug' => 'admin',
            'nip' => '1234567656',
            'password' => bcrypt(12345678),
            'address' => 'Malang',
            'role_id' => 1
        ]);

        User::create([
            'name' => 'nabila',
            'slug' => 'nabila',
            'nip' => '1234598789',
            'password' => bcrypt(12345678),
            'address' => 'Lowokwaru',
            'role_id' => 2
        ]);
    }
}
