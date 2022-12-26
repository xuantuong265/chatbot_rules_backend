<?php

namespace App\Models;

use Database\Factories\SubjectFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'subject',
        'id_student',
        'attendance',
        'homeword',
        'midterm_score',
        'term_end_point',
        'total_score',
    ];
    public function student()
    {
        return $this->hasOne(Student::class);
    }
    protected static function newFactory()
    {
        return SubjectFactory::new();
    }
}
