<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                "name" => "Super Admin",
                "description" => "Super Admin Role"], [
                "name" => "Admin",
                "description" => "Admin Role",
            ], [
                "name" => "User",
                "description" => "User Role",
            ],
        ];
        foreach ($roles as $role) {
            Roles::create($role);
        }
    }
}
