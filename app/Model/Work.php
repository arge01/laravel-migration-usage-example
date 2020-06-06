<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $table = "works";

    protected $fillable =[
        "name", "no", "clock"
    ];
}
