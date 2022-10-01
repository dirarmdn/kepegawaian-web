<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    // public function index() {
    //     $pegawai = DB::table('karyawan')
    //     ->join('golongan', 'golongan.id', '=', 'karyawan.id_golongan')
    //     ->get();
    //     return view('pegawai')->with('pegawai', $pegawai);
    // }

    // public function detail() {
    //     $pegawai = DB::table('karyawan')
    //     ->join('golongan', 'golongan.id', '=', 'karyawan.id_golongan')
    //     ->get();
    //     return view('kepegawaian')->with('pegawai', $pegawai);
    // }

    // public function insert(Request $request){
    //     return $request->file('image')->store('pegawai-images');
    //     $request->validate([
    //         'nik' => 'required|min:7',
    //         'nip' => 'required',
    //         'nama' => 'required',
    //         'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    //     ]);
        
    //     Pegawai::create($request->all());
    //     return redirect()->route('pegawai')->with('success','Data berhasil Di Tambahkan');
    // }

    public function addpage(){
        return view('input-pegawai');
    }

    public function detailpegawai(){
        return view('detail-kepegawaian');
    }

    // edit
    // public function edit($id){
    //     $pegawai = Pegawai::find($id);
    //     return view('edit-pegawai', compact('pegawai'));
    // }

    // // fungsi edit
    // public function updatedata(Request $request, $id){
    //     $this->validate($request,[
    //     'nik' => 'required|min:7|max:200',
    //     'nama' => 'required',
    //     ]);
    //     $pegawai = pegawai::find($id);
    //     $pegawai ->update($request->all());
    //     return redirect()->route('pegawai')->with('success','Data berhasil Di Update');
    // }

        // public function deletedata($id){
        //     $pegawai = pegawai::find($id);
        //     if ($pegawai != null) {
        //         $pegawai->delete();
        //         return redirect()->route('pegawai')->with('success','Data berhasil Di Hapus');
        //     }
        //     return redirect()->route('pegawai')->with('success','Data gagal Di Hapus');
        // }
}
