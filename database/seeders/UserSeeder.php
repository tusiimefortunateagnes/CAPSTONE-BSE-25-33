<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::factory(10)->create([
            'name' => 'Super Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('admin@12345'),
            'role' => 'super-admin',
        ]);

    }
}
