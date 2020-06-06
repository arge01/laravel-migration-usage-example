<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class StudentCard extends Model
{
    protected $table = 'student_cards';

    protected $fillable = [
    	"student_id", "tc_no", "no", "name", "tel", "cep", "address", "email", "images"
    ];
}
