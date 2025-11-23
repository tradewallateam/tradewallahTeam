<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        if (User::count() > 0) {
            echo "UserSeeder skipped — users already exist.\n";
            return;
        }

        $admin = User::create([
            'first_name' => 'Test',
            'last_name' => 'User',
            'email' => 'test@example.com',
            'phone_number' => '1234567890',
            'address' => '123 Test St, Test City',
            'password' => 'password',
        ]);

        $role = Role::create(['name' => 'admin']);

        $admin->assignRole($role);
    }
}
