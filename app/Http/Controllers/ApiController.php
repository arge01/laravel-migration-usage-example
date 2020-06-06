<?php

namespace App\Http\Controllers;

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

    public function studentNote($student_no) {
    	$student_notes = Student::where('statu', 1)->where('no', $student_no)->with('student_notes')->first();

    	if ( $student_notes ) {

    		if ( request()->isMethod('POST') ) {
    			$data = [
    				'student_id' => $student_notes->id,
    				'no' => $student_notes->no,
	                'exam' => request('exam'),
	                'final' => request('final'),
	                'task' => request('task'),
	                'case' => request('case'),
	                'average' => request('average'),
	                'work_id' => 1
	            ];

	            if ( !$data["task"] )
	            	$data["average"] = ( $data["exam"] * ( 30 / 100 ) ) + ( $data["final"] * ( 70 / 100 ) );
	            else
	            	$data["average"] = ( $data["exam"] * ( 30 / 100 ) ) + ( $data["final"] * ( 50 / 100 ) ) + ( $data["task"] * ( 20 / 100 ) );

	           	if ( $data["average"] >= 45 )
	           		$data["case"] = 1;
	           	else 
	           		$data["case"] = 0;

	           	$create = StudentNote::create($data);

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
		                'data' => $data
		            ]);
	           	}

    		} else {
    			return response()->json($student_notes);
    		}
    	}
    	else
    		return response()->json("No data");
    }
}
