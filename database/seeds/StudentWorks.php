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
            "exam" => 100,
            "final" => 100,
            "average" => 100,
            "task" => null,
            "case" => true,
            "work_no" => $student_works->student_work,
            "url" => [
                "Students" => "http://127.0.0.1:8000/api/student/all",
                "Works" => "http://127.0.0.1:8000/api/work/all",
                "Student" => "http://127.0.0.1:8000/api/student/profile/$student_works->student_no",
                "Work" => "http://127.0.0.1:8000/api/work/$student_works->student_work",
                "Note" => "http://127.0.0.1:8000/api/student/profile/$student_works->student_no/work/$student_works->student_work",
            ]
        ];
        echo "------";
        echo "Example succesfull data";
        echo "------";
        print_r($insert);
        unset($insert["url"]);
        DB::table("student_notes")->insert($insert);
    }
}
