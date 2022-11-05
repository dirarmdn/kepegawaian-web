<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use App\Exports\PegawaiExport;
use App\Imports\PegawaiImport;
use Illuminate\Support\Facades\DB;

class ExportController extends Controller
{
    public function generatedpdf(){
        $pegawai = Pegawai::find($id);
        $golongan = DB::table('golongan')->get();
        $pdf = PDF::loadVIew('pegawai', ['pegawai', 'golongan' => $pegawai, $golongan]);
        return $pdf->download('pegawai.pdf');        
    }

    public function import(){
        Excel::import(new PegawaiImport, request()->file('file'));
        return redirect('data-pegawai')->with('success','Data berhasil Ditambahkan');
    }

    public function export(){
        $nama_file = 'laporan_pegawai_'.date('Y-m-d_H-i-s').'.xlsx';
        return Excel::download(new PegawaiExport, $nama_file);
    }
}
