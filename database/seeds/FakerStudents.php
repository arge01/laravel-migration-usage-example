<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class FakerStudents extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        DB::table('students')->truncate();

        for ( $i = 0; $i < 45; $i++ ) {
            $random = substr(str_shuffle("10123456789"), 0, 12);

            DB::table('students')->insert([
                'name'=> $faker->name,
                'statu' => 1,
                'tc_no' => $random, 
                'no' => $random
            ]);
        }
    }
}
