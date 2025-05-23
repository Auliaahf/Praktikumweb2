<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use illuminate\Database\Eloquent\Relations\HasMany;

class Majors extends Model
{
    public function students()
    {
        return $this->hasMany(Student::class);

    }

    protected $fillable = [
        'name',
        'code',
        'description',
    ];
}
