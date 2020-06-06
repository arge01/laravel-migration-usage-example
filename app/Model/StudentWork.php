<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class StudentWork extends Model
{
    protected $table = "student_works";

    protected $fillable = [
        "work_no", "student_no"
    ];
}
