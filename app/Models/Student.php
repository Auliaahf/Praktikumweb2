<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function majors()
    {
        return $this->belongsTo(Majors::class, "major_id");
    }

    protected $fillable = [
        'name',
        'student_id_number',
        'email',
        'phone_number',
        'birth_date',
        'gender',
        'status',
        'major_id'
    ];

}