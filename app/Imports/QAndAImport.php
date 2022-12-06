<?php

namespace App\Imports;

use App\Models\QAndA;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class QAndAImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new QAndA([
            'id' => $row['id'],
            'option'     => $row['option'],
            'entity'    => $row['entity'],
            'text' =>   $row['text']
        ]);
    }
}
