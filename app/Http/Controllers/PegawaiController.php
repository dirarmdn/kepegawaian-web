<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $pegawai = DB::table('karyawan')->get();
        $golongan = DB::table('golongan')->get();

        return view('pegawai.index', [
            'title' => 'Data Pegawai',
            'active' => 'pegawai'
        ], 
        compact(['pegawai', 'golongan']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        $pegawai = DB::table('karyawan')->get();
        $golongan = DB::table('golongan')->get();

        return view('pegawai.create', [
            'title' => 'Tambah Data Pegawai',
            'active' => 'pegawai'
        ], 
        compact(['pegawai', 'golongan']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $validatedData = $request->validate([
            'nik' => '',
            'nip' => '',
            'nama' => '',
            'jenis_kelamin' => '',
            'tempat_lahir' => '',
            'tanggal_lahir' => '',
            'status_nikah' => '',
            'agama' => '',
            // 'foto' => 'image|file|max:2048',
            'alamat' => '',
            'id_golongan' => '',
            'telpon' => '',
        ]);

        DB::table('karyawan')->insert($validatedData);

        return redirect()->route('pegawai.index')->with('success','Data berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

        $pegawai = DB::table('karyawan')->get();
        $golongan = DB::table('golongan')->get();

        return view('pegawai.show', [
            'title' => 'Detail Pegawai'
        ], 
        compact(['pegawai', 'golongan']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

        $pegawai = Pegawai::find($id);
        $golongan = DB::table('golongan')->get();

        return view('pegawai.edit', [
            'title' => 'Edit Data Pegawai',
            'active' => 'pegawai'
        ], 
        compact(['pegawai', 'golongan']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        // $this->validate($request,[
        //     'foto' => 'image|file|max:2048',
        // ]);
        $pegawai = Pegawai::find($id);
        $pegawai->update($request->all());

        return redirect()->route('pegawai.index')->with(['info','Data berhasil Di Update']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {

        $pegawai = Pegawai::find($id);
        if ($pegawai != null) {
            $pegawai->delete();
            return redirect()->route('pegawai.index')->with('success','Data berhasil Di Hapus');
        }
        
        return redirect()->route('pegawai.index')->with('error','Data gagal Di Hapus');
    }
}
