<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param Faker $faker
     * @return void
     */
    public function run(Faker $faker)
    {
        $insert = [
            'name' => $faker->name,
            'email' => $faker->unique()->safeEmail,
            'email_verified_at' => "",
            'password' => 123, // secret
            'remember_token' => Str::random(10),
        ];

        echo "------";
        echo "Example user";
        echo "------";
        print_r($insert);
        echo "------";

        $insert["password"] = Hash::make($insert["password"]);
        $insert["email_verified_at"] = now();
        DB::table('users')->insert($insert);
    }
}
