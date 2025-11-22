<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MemberSeeder extends Seeder
{
    public function run(): void
    {

        if (Member::count() > 0) {
            echo "MemberSeeder skipped — members already exist.\n";
            return;
        }

        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            Member::create([
                'name'         => $faker->name,
                'email'        => $faker->unique()->safeEmail,
                'phone_number' => $faker->phoneNumber,
                'address'      => $faker->address,
                'country'      => $faker->country,
                'status'       => $faker->randomElement([true, false]),
            ]);
        }
    }
}
