<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class FakerWork extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param Faker $faker
     * @return void
     */
    public function run(Faker $faker)
    {
        DB::table("works")->truncate();

        for ( $i = 0; $i <= 10; $i++ ) {
            DB::table('works')->insert([
                "no" => $faker->creditCardNumber,
                "name" => $faker->text(30)
            ]);
        }
    }
}
