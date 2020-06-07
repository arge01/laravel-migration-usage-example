<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class StudentNote extends Model
{
    protected $table = "student_notes";

    protected $fillable = [
    	"student_no", "student_notes_no", "exam", "final", "average", "task", "case", "work_no"
    ];
}
