<?php

namespace App\Exports;

use App\Models\PenawaranModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PenawaranExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PenawaranModel::all()->makeHidden(['id','created_at','updated_at' ])->sortBy('nama_obat');
    }

    public function headings(): array
    {
        return ["Nama Obat", "Pabrikan", "Unit","Satuan", "Harga Beli", "Harga Beli Satuan","Keuntungan 20%", "Harga Jual"];
    }
}
