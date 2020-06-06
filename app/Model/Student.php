<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    protected $fillable = [
        'name', 'tc_no', 'no', 'statu'
    ];

    public function student_card()
    {
        return $this->belongsTo('App\Model\StudentCard', 'no', 'no');
    }

    public function student_notes() {
    	return $this->hasMany('App\Model\StudentNote', 'no', 'no');
    }
}
