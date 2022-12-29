<?php

namespace App\Http\Controllers;

use App\Exports\QAndAExport;
use App\Imports\QAndAImport;
use App\Models\QAndA;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class QAndAController extends Controller
{
  /**
    * @return \Illuminate\Support\Collection
    */
    public function index()
    {
        $qa = QAndA::get();

        return view('question', compact('qa'));
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function export()
    {
        return Excel::download(new QAndAExport, 'question.xlsx');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function import()
    {
        Excel::import(new QAndAImport,request()->file('file'));

        return back();
    }

    public function api()
    {
        $data = QAndA::get();
        $data = $data->groupBy(function ($item){
            return $item->entity;
        });
            $listItem = [];
        foreach ($data->toArray() as $item => $value)
        {
            $data1 = $this->formatData($value);

            $listItem[] =[
                'intent' => $item,
                'utterances' => $data1['question'],
                'answers' => $data1['answer'],
            ];    
        }
        return [
            'name' => "Corpus",
            'locale' => "vi-VN",
            'data' => $listItem
        ];
    }
    private function formatData($data)
        {
            $q = [];
            $a = [];
            foreach ($data as $item) 
            {
                if($item['option']==1){
                    $q[] = $item['test'];
                }
                if($item['option']==2){
                    $a[] = $item['test'];
                }
            }
            return [
                'question' => $q,
                'answer' => $a
            ];
        }
}
