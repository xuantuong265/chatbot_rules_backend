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
        foreach ($data as $t)
        {
            
        }
        return response()->json_encode($data);
    }
}
