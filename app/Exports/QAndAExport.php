<?php

namespace App\Exports;

use App\Models\QAndA;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class QAndAExport implements FromCollection, WithHeadings
{
 /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return QAndA::select("id","option", "entity", "text")->get();
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["ID", "Option", "Entity","Text"];
    }
}
