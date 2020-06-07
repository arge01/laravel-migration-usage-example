<?php

use App\Model\Student;
use App\Model\Work;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class FakerStudentWorks extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param Faker $faker
     * @return void
     */
    public function run(Faker $faker)
    {
        $students = Student::where("statu", 1)->get();
        $works = Work::all();

        foreach ( $works as $key => $work ) {
            DB::table("student_works")->insert([
                "student_work" => $faker->creditCardNumber,
                "work_no" => $work->no,
                "student_no" => $students[$key]->no
            ]);
        }
    }
}
