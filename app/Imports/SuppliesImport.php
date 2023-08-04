<?php

namespace App\Imports;

use App\Models\Supply;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SuppliesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Supply([
            'code' => $row['code'],
            'description' => $row['description'],
            'cost' => $row['price'],
            'year_and_month' => $row['year_and_month'],
            'location' => $row['location'],
        ]);
    }
}
