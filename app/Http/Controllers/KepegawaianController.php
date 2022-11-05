<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KepegawaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $pegawai = DB::table('karyawan')
        ->join('golongan', 'golongan.id', '=', 'karyawan.id_golongan')
        ->get();

        return view('kepegawaian.index', [
            'title' => 'Data Kepegawaian',
            'active' => 'kepegawaian'
        ])->with('pegawai', $pegawai);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        $pegawai = DB::table('karyawan')->get();
        $golongan = DB::table('golongan')->get();

        return view('kepegawaian.create', [
            'title' => 'Tambah Data Kepegawaian',
            'active' => 'kepegawaian'
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
            'nip' => '',
            'nama' => '',
            'jenis_kelamin' => '',
            'id_golongan' => '',
        ]);

        DB::table('karyawan')->insert($validatedData);

        return redirect('kepegawaian.index')->with('success','Data berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai) {

        $pegawai = Pegawai::find($id);
        $golongan = DB::table('golongan')->get();

        return view('kepegawaian.show', [
            'title' => 'Detail Kepegawaian',
            'active' => 'kepegawaian'
        ], 
        compact(['pegawai', 'golongan']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $pegawai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawai) {

        $pegawai = Pegawai::find($id);
        if ($pegawai != null) {
            $pegawai->delete();
            return redirect()->route('kepegawaian.index')->with('success','Data berhasil Di Hapus');
        }

        return redirect()->route('kepegawaian.index')->with('error','Data gagal Di Hapus');
    }
}
