<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GolonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $golongan = DB::table('golongan')->get();
        return view('golongan', compact('golongan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('input-golongan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id'     => 'required',
            'nama_golongan'   => 'required'
        ]);
        Golongan::create($request->all());
        return redirect()->route('golongan')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Golongan  $golongan
     * @return \Illuminate\Http\Response
     */
    public function show(Golongan $golongan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Golongan  $golongan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $golongan = Golongan::find($id);
        return view('edit-golongan', compact('golongan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Golongan  $golongan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Golongan $golongan, $id)
    {
        $this->validate($request, [
            'id'     => 'required',
            'nama_golongan'  => 'required'
        ]);
        $golongan = Golongan::find($id);
        $golongan ->update($request->all());
        return redirect()->route('golongan')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Golongan  $golongan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Golongan $golongan, $id)
    {
        $golongan = Golongan::find($id);
        if ($golongan != null) {
            $golongan->delete();
            return redirect()->route('golongan')->with('success','Data berhasil Di Hapus');
        }
        return redirect()->route('golongan')->with('error','Data gagal Di Hapus');
    }

    public function showdetail($id)
    {
        $golongan = Golongan::find($id);
        return view('detail-golongan', compact('golongan'));
    }
}
