<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenawaranModel;
use DataTables;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PenawaranImport;
use App\Exports\PenawaranExport;

class PenawaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()){
            $data = PenawaranModel::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($model){
                    $btn = '<a class="btn btn-info" id="show-penawaran" data-toggle="modal" data-id="'.$model->id.'"><i class="fas fa-clipboard-list"></i></a>
                    <a class="btn btn-success" id="edit-penawaran" data-toggle="modal" data-id="'.$model->id.'"><i class="fas fa-edit"></i></a>
                    <a id="delete-penawaran" data-id="'.$model->id.'" class="btn btn-danger delete-user"><i class="fas fa-prescription-bottle"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->toJson();
        }
        return view('penawaran-harga.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_obat' => 'required',
            'pabrikan' => 'required',
            'unit' => 'required',
            'satuan' => 'required',
            'harga_beli' => 'required',
            'harga_beli_satuan' => 'required',
            'keuntungan' => 'required',
            'harga_jual_satuan' => 'required',
        ]);

        PenawaranModel::updateOrCreate(
            ['id' => $request->penawaran_id],
            [
                'nama_obat' => $request->nama_obat,
                'pabrikan' => $request->pabrikan,
                'unit' => $request->unit,
                'satuan' => $request->satuan,
                'harga_beli' => $request->harga_beli,
                'harga_beli_satuan' => number_format((float)$request->harga_beli_satuan , 2, '.', ''),
                'keuntungan' => number_format((float)$request->keuntungan , 2, '.', ''),
                'harga_jual_satuan' => $request->harga_jual_satuan
            ]
        );

        return response()->json();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($penawaran)
    {
        $data = PenawaranModel::find($penawaran);
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($penawaran)
    {
        PenawaranModel::find($penawaran)->delete();
        return response()->json();
    }

    public function import(Request $request)
    {
        $request->validate([
            'file_import' => 'required|mimes:csv,xlsx,xls'
        ]);

        if ($request->hasFile('file_import')){
            $file = $request->file('file_import');
            $filename = time()."_".$file->getClientOriginalName();
            $import = $file->move(public_path('dokumen/penawaran'), $filename);
            Excel::import(new PenawaranImport, $import);
        }
        return response()->json();
    }

    public function export()
    {
        return Excel::download(new PenawaranExport, 'Penawaran Harga.xlsx');
    }
}
