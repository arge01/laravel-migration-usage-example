<?php

namespace App\Http\Controllers;

use App\Model\StudentWork;
use App\Model\Work;
use Illuminate\Http\Request;
use App\Model\Student;
use App\Model\StudentNote;
use App\Model\StudentCard;

class ApiController extends Controller
{
    public function allStudents() {
    	$students = Student::where('statu', 1)->paginate(15);
    	return response()->json($students);
    }

    public function studentCard($student_no) {
    	$student_card = Student::where('no', $student_no)->with('student_card')->first();

    	if ( $student_card )
    		return response()->json($student_card);
    	else
    		return response()->json("No data");
    }

    public function studentWorks($student_no) {
        $student = Student::where('no', $student_no)->with('student_works')->first();

        if ( $student )
            return response()->json($student);
        else
            return response()->json("No data");
    }

    public function studentWorkNote($student_no, $work_no) {
        $student = StudentWork::where('student_no', $student_no)->first();

        if ( $student ) {
            $student_note = StudentNote::where('work_no', $work_no)->first();
            if ( $student_note ) {
                return response()->json($student_note);
            } else {
                return response()->json("Ders notu henüz girilmemiş");
            }
        } else {
            return response()->json("Böyle bir ders alan öğrenci yok.");
        }
    }

    public function studentWorkNoteCreate($student_no, $work_no) {
        $student_works = StudentWork::where('student_no', $student_no)->where('work_no', $work_no)->first();

        $insert = [
            "student_no" => $student_works->student_no,
            "student_notes_no" => request("student_notes_no"),
            "exam" => request("exam"),
            "final" => request("final"),
            "average" => null,
            "task" => request("task"),
            "case" => null,
            "work_no" => $student_works->student_work
        ];

        if ( !$insert["task"] )
            $insert["average"] = ( $insert["exam"] * ( 30 / 100 ) ) + ( $insert["final"] * ( 70 / 100 ) );
        else
            $insert["average"] = ( $insert["exam"] * ( 30 / 100 ) ) + ( $insert["final"] * ( 50 / 100 ) ) + ( $insert["task"] * ( 20 / 100 ) );

        if ( $insert["average"] >= 45 )
            $insert["case"] = 1;
        else
            $insert["case"] = 0;

        $create = StudentNote::create($insert);

        if ( $create ) {
            return back()->with([
                'message' => 'Ekleme işlemi başarılı.',
                'status' => 'success',
                'data' => $create
            ]);
        } else {
            return back()->with([
                'message' => 'Ekleme işlemi başarısız oldu!',
                'status' => 'error',
                'data' => $insert
            ]);
        }
    }

    public function allWorks() {
        $works = Work::all();
        return response()->json($works);
    }


}
