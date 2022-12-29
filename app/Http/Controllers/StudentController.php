<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentApiRequest;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::paginate(20);
        return view('showstudent', compact('students'));
    }
    public function score($id)
    {
        $students = Student::where('id',$id)->firstOrFail();
        $subjects = Subject::where('student_id',$id)->get();
        return view('showscore', compact('students','subjects'));
    }
    public function show(StudentApiRequest $request){
        $columns = ['students.name','students.code','students.class',
        'subjects.subject','subjects.student_id','subjects.attendance','subjects.homeword',
        'subjects.midterm_score','subjects.term_end_point'
         ];
        $data = Student::select($columns)
        ->join('subjects', 'subjects.student_id', '=', 'students.id')
        ->where('students.code',$request->code)
        ->where('students.email',$request->email)
        ->get() ;
        $data = $data->groupBy(function ($item){
            return $item->student_id;
        });
            $listItem = [];
        foreach ($data as $item => $value)
        {
            $listItem[] = [
                'student_id' => $item,
                'name' => $value->first()->name,
                'code' => $value->first()->code,
                'class' => $value->first()->class,
                'score' => $this->formatData($value)
            ]; 
        }

        return $listItem;
    }

    public function api()
    {
        dd("hello");
        $columns = ['students.name','students.code','students.class',
        'subjects.subject','subjects.student_id','subjects.attendance','subjects.homeword',
        'subjects.midterm_score','subjects.term_end_point'
         ];
        $data = Student::select($columns)
        ->join('subjects', 'subjects.student_id', '=', 'students.id')
        ->where('students.id',$id)
        ->get() ;
        $data = $data->groupBy(function ($item){
            return $item->student_id;
        });
            $listItem = [];
        foreach ($data as $item => $value)
        {
            $listItem[] = [
                'student_id' => $item,
                'name' => $value->first()->name,
                'code' => $value->first()->code,
                'class' => $value->first()->class,
                'score' => $this->formatData($value)
            ]; 
        }

        return view('showscore', compact('students'));
    }
    private function formatData($data)
    {
        $items = [];
        foreach ($data as $item) {
            $items [] = [
            'subject' => $item['subject'],
            'attendance' => $item['attendance'],
            'homeword' => $item['homeword'],
            'midterm_score' => $item['midterm_score'],
            'term_end_point' => $item['term_end_point'],
            ];
        }
        return $items;
    }
}
