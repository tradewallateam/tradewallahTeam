<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone_number' => '1234567890',
            'address' => '123 Test St, Test City',
            'password' => 'password123',
        ]);

        $role = Role::create(['name' => 'admin']);

        $admin->assignRole($role);
    }
}
