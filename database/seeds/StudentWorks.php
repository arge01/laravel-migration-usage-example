<?php

use App\Model\StudentWork;
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
        $student_works = StudentWork::find(1);
        $insert = [
            "student_no" => $student_works->student_no,
            "student_notes_no" => $faker->creditCardNumber,
            "exam"=>100,
            "final"=>100,
            "average"=>100,
            "task"=>null,
            "case"=>true,
            "work_no"=>$student_works->work_no
        ];
        echo "------";
        echo "Example succesfull data";
        echo "------";
        print_r($insert);
        DB::table("student_notes")->insert($insert);
    }
}
