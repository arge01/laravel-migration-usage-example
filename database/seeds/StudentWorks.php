<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class StudentWorks extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param Faker $faker
     * @return void
     */
    public function run(Faker $faker)
    {
        $student = \App\Model\Student::find(1);
        
    }
}
