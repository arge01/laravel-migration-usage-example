<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Model\Student;

class FacerStudentCard extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
    	$students = Student::all();

    	foreach ($students as $key => $student) {
    		DB::table('student_cards')->insert([
	            "student_id" => $student->id,
	            "tc_no" => $student->tc_no,
	            "no" => $student->no,
	            "name" => $student->name,
	            "address" => $faker->address,
	            "email" => $faker->unique()->safeEmail
	        ]);

    	}
    }
}
