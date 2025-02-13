<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Thêm dữ liệu mẫu vào bảng user_profiles
        for ($i = 1; $i <= 10; $i++) {
            DB::table('user_profiles')->insert([
                'user_id' => $i,  // Giả sử bảng users có ít nhất 10 người dùng
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'dob' => $faker->date(),
                'avatar' => $faker->imageUrl(200, 200, 'people'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
