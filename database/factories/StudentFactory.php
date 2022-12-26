<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->withFaker()->name(),
            'code' => $this->withFaker()->unique()->regexify('[A]{1}[0-9]{3}'),
            'address' => $this->withFaker()->city(),
            'email' => $this->withFaker()->unique()->safeEmail(),
            'gender' => $this->withFaker()->regexify('[1-3]{1}'),
            'birthday' => $this->withFaker()->date('Y-m-d H:i:s'),
            'class' => $this->withFaker()->regexify('[A]{1}[1-9]{1}'),
        ];
    }
}
