<?php

namespace App\Models;

use Database\Factories\StudentFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = [
        'id',
        'name',
        'code',
        'address',
        'email',
        'gender',
        'birthday',
        'class',
        'average_socre',
    ];


    /**
     * Get the subjects that owns the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subjects()
    {
        return $this->belongsTo(Subject::class, 'student_id', 'id');
    }

    protected static function newFactory()
    {
        return StudentFactory::new();
    }
}
