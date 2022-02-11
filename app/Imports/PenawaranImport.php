<?php

namespace App\Imports;

use App\Models\PenawaranModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithStartRow;

class PenawaranImport implements ToModel, WithStartRow, WithCalculatedFormulas
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        return new PenawaranModel([
            'nama_obat' => $row[1],
            'pabrikan' => $row[2],
            'unit' => $row[3],
            'satuan' => $row[4],
            'harga_beli' => $row[5],
            'harga_beli_satuan' => number_format((float)$row[6] , 2, '.', ''),
            'keuntungan' => number_format((float)$row[7] , 2, '.', ''),
            'harga_jual_satuan' => $row[8]
        ]);
    }
}
