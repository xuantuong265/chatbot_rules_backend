<?php

namespace Database\Factories;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubjectFactory extends Factory
{

    protected $model = Subject::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $studentId = \DB::table('students')->pluck('id');
        return [
            'subject' => $this->withFaker()->regexify('[A-Z]{1}[a-z]{10}'),
            'student_id' => $this->withFaker()->randomElement($studentId),
            'attendance'=> $this->withFaker()->randomFloat(1, 0, 10),
            'homeword' =>$this->withFaker()->randomFloat(1, 0, 10),
            'midterm_score'=>$this->withFaker()->randomFloat(1, 0, 10),
            'term_end_point'=>$this->withFaker()->randomFloat(1, 0, 10),
        ];
    }
}
